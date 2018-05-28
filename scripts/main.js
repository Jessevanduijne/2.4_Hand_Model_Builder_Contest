function update(renderer, scene, camera, mouseOrbitControls)
{
    //Make the renderer render the scene and the camera
    renderer.render(
        scene,
        camera
    );

    mouseOrbitControls.update();

    //Calls itself each time the function is called upon using recursion
    requestAnimationFrame(function()
    {
        update(renderer, scene, camera, mouseOrbitControls);
    })
}

function loadScene()
 {
    console.log("LOG: Program start");

    //Create dat.gui instance
    var gui = new dat.GUI();

    //Create scene
    var scene = new THREE.Scene();
    //Create a fog effect in the scene
    //scene.fog = createFog(0xffffff, 0.2);


    //Create camera
    var camera = new THREE.PerspectiveCamera(
        //Perspective
        45,
        //Ratio
        window.innerWidth/window.innerHeight,
        //Near clipping distance
        1,
        //Far clipping distance
        1000
    );

    //Set the camera position x,y,z
    setCameraPosition(camera, 1, 2, 7);

    //Create a grid of boxes
    var boxGrid = createBoxGrid(10, 1.5);

    //Create a square plane
    var plane = createPlane(20);
    plane.name = "plane-1";
    rotateObject(plane, -90, 0, 0);

    //Create a light source
    var light = createPointlight(1, 1, 2, 2, gui);

    //Create a sphere
     var sphere = createSphere(0.05);

    scene.add(plane);
    scene.add(light);
    scene.add(boxGrid);
     light.add(sphere);

    //Create renderer
    var renderer = new THREE.WebGLRenderer();
    //Set renderer size
    renderer.setSize(window.innerWidth*0.9, window.innerHeight*0.9);
    //Set renderer background color
    renderer.setClearColor('gray');
    //Enable renderer shadows
     renderer.shadowMap.enabled = true;
    //Get element by ID
    document.getElementById('scene').appendChild(renderer.domElement);

     //Initialise and declare orbit controls
     var mouseOrbitControls = new THREE.OrbitControls(camera, renderer.domElement);

    //Update the renderer, scene and camera
    update(renderer, scene, camera, mouseOrbitControls);

    return scene;
}

function createFog(color, density)
{
    return new THREE.FogExp2(color, density);
}

function createPlane(size)
{
    var object = new THREE.PlaneGeometry(size, size);
    var material = new THREE.MeshPhongMaterial
    ({
        color: 'gray',
        side: THREE.DoubleSide
    });

    var mesh = new THREE.Mesh(object, material);
    mesh.receiveShadow = true;

    console.log("LOG: Plane created");
    return mesh;
}

function createBox(w, d, h)
{
    var object = new THREE.BoxGeometry(w, d, h);
    var material = new THREE.MeshPhongMaterial
    ({
        color: 'gray'
    });

    var mesh = new THREE.Mesh(object, material);
    mesh.castShadow = true;

    console.log("LOG: Box created");
    return mesh;
    //scene.add(mesh);
}

function createBoxGrid(amount, separationMultiplier)
{
    var group = new THREE.Group();

    for (var i=0; i<amount; i++)
    {
        var obj = createBox(1, 1, 1);
        obj.position.x = i * separationMultiplier;
        obj.position.y = obj.geometry.parameters.height/2;
        group.add(obj);

        for (var j=1; j<amount; j++)
        {
            var obj = createBox(1, 1, 1);
            obj.position.x = i * separationMultiplier;
            obj.position.y = obj.geometry.parameters.height/2;
            obj.position.z = j * separationMultiplier;
            group.add(obj);
        }
    }

    group.position.x = -(separationMultiplier * (amount-1))/2;
    group.position.z = -(separationMultiplier * (amount-1))/2;

    return group;
}

function createSphere(radius)
{
    var object = new THREE.SphereGeometry(radius, 24, 24);
    var material = new THREE.MeshBasicMaterial
    ({
        color: 'white'
    });

    var mesh = new THREE.Mesh(object, material);

    console.log("LOG: Box created");
    return mesh;
    //scene.add(mesh);
}

function createPointlight(intensity, x, y, z, gui)
{
    var light = new THREE.PointLight('white', intensity)
    light.position.x = x;
    light.position.y = y;
    light.position.z = z;

    light.castShadow = true;

    gui.add(light, 'intensity', 0, 15);
    gui.add(light.position, 'y', 0, 10);

    return light;
}

function setCameraPosition(camera, x, y, z)
{
    //Set camera position
    camera.position.x = x;
    camera.position.y = y;
    camera.position.z = z;

    camera.lookAt(new THREE.Vector3(0, 0, 0));

    console.log("LOG: Camera position set");
}

function rotateObject(object,degreeX=0, degreeY=0, degreeZ=0)
{
    degreeX = (degreeX * Math.PI)/180;
    degreeY = (degreeY * Math.PI)/180;
    degreeZ = (degreeZ * Math.PI)/180;

    object.rotateX(degreeX);
    object.rotateY(degreeY);
    object.rotateZ(degreeZ);
}

var scene = loadScene();
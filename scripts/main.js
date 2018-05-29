window.onload = init;

function init()
{
    //Create scene
    var scene = new THREE.Scene();

    //Create camera
    var camera = createCamera(0, 1, 9, 45, window.innerWidth/window.innerHeight, 1, 1000);

    //Create a square plane
    var plane = createPlane(20, 'blue');
    rotateObject(plane, -90, 0, 0);

    //Hardcoded File Path:
    var path = 'models/knuckles.stl';

    //Load the model
    var model = loadModel(scene, path, 'red');

    //Create dat.gui instance (Allows for easy property manipulation in the browser)
    var gui = new dat.GUI();

    //Create a light source (& sphere to visualize source)
    var light = createPointLight(1, 1, 2, 2, gui);
    var sphere = createSphere(0.05);

    //Add all models to the scene
    scene.add(camera);
    scene.add(plane);
    scene.add(model);
    scene.add(gui);

    //Add a light source to the scene & visualize it with a sphere
    scene.add(light);
    light.add(sphere);

    var renderer = createRenderer('scene', window.innerWidth*0.9, window.innerWidth*0.9, 'gray');
    var orbitControl = createOrbitController(camera, renderer);

    //Update the renderer, scene and camera
    update(renderer, scene, camera, orbitControl    );
}

function update(renderer, scene, camera, control)
{
    //Make the renderer render the scene and the camera
    renderer.render(
        scene,
        camera
    );

    //Call the update function in the orbit control
    control.update();

    //Make the method call itself so it will loop indefinitely
    requestAnimationFrame(function()
    {
        update(renderer, scene, camera, control);
    });
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
window.onload = init;
var scene = new THREE.Scene();

//The function that is run once when the page loads
function init()
{
    //Create a new (more flexible) GUI panel
    var gui;
    //= new dat.GUI({ autoPlace: false });

    //var customContainer = document.getElementById('gui-container');
    //customContainer.appendChild(gui.domElement);

    //Create scene
     scene = new THREE.Scene();

    //Create camera
    var camera = createCamera
    (
        3,              //x position
        0,              //y position
        0,              //z position
        45,             //perspective
        WINDOW_RATIO,   //ratio (1 == original size)
        0.1,              //Near field clipping plane
        2000,           //Far field clipping plane
        gui             //GUI object
    );

    //Load the model
    var geometry = loadModel(scene, HARDCODED_3DMODEL_PATH, DEFAULT_MODEL_COLOR, 0.014);

    //Create a light source (& sphere to visualize source)
    var light = createPointLight(0.8, 1, 2, 2);

    //Add a light source to the camera
    camera.add(light);

    //Add all models to the scene
    scene.add(camera);

    var renderer = createRenderer
    (
        'scene',            //Scene name
        window.innerWidth/2,  //Width
        window.innerHeight/2, //Height
        BACKGROUND_COLOR    //Background color
    );


    var orbitControl = createOrbitController(camera, renderer);

    //Disable the use of the arrow keys on the keyboard
    orbitControl.enableKeys = false;
    //Disable panning the orbit controller (relative to the model)
    orbitControl.enablePan = false;

    //Update the renderer, scene and camera
    update(renderer, scene, camera, orbitControl);

    if(savedImage != null)
    {
        var img = document.createElement('img');
        img.src = savedImage;

        var target = document.getElementById("image-container");
        target.appendChild(img);
    }
    else
    {
        var img = document.getElementById("image-container");
        console.log("LOG: Image could not be found");
    }
}

//The function that serves as an endless loop, allowing for animations and dynamic changes in the render
function update(renderer, scene, camera, control)
{
    onWindowResize(camera, renderer);

    renderer.setClearColor( 0x000000, 0 );

    //Make the renderer render the scene and the camera
    renderer.render
    (
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



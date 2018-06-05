window.onload = init;

//The function that is run once when the page loads
function init()
{
    //Create a new (more flexible) GUI panel
    var gui = new dat.GUI({ autoPlace: false });

    var customContainer = document.getElementById('gui-container');
    customContainer.appendChild(gui.domElement);

    //Create scene
    var scene = new THREE.Scene();

    //Create camera
    var camera = createCamera
    (
        3,              //x position
        -2,             //y position
        0,              //z position
        45,             //perspective
        WINDOW_RATIO,    //ratio (1 == original size)
        1,              //Near field clipping plane
        2000,           //Far field clipping plane
        gui             //GUI object
    );

    //Load the model
    loadModel(scene, HARDCODED_3DMODEL_PATH, DEFAULT_MODEL_COLOR, 0.014);

    //Create a light source (& sphere to visualize source)
    var light = createPointLight(0.8, 1, 2, 2, gui);

    //Add all models to the scene
    scene.add(camera);

    //Add a light source to the camera
    camera.add(light);

    var renderer = createRenderer
    (
        'scene',            //Scene name
        window.innerWidth,  //Width
        window.innerHeight, //Height
        BACKGROUND_COLOR    //Background color
    );

    var orbitControl = createOrbitController(camera, renderer);

    //Disable the use of the arrow keys on the keyboard
    orbitControl.enableKeys = false;
    //Disable panning the orbit controller (relative to the model)
    orbitControl.enablePan = false;

    gui.add(light, 'intensity', 0.01, 10);

    createScreenshotButton(renderer, scene, camera);

    //Update the renderer, scene and camera
    update(renderer, scene, camera, orbitControl);
}

//The function that serves as an endless loop, allowing for animations and dynamic changes in the render
function update(renderer, scene, camera, control)
{
    onWindowResize(camera, renderer);

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



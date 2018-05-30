window.onload = init;

function init()
{
    //Create dat.gui instance (Allows for easy property manipulation in the browser)
    var gui = new dat.GUI();

    //Create scene
    var scene = new THREE.Scene();

    //Create camera
    var camera = createCamera
    (
        10,             //x position
        1,              //y position
        0,              //z position
        30,             //perspective
        (1080/1920),    //ratio (1 == original size)
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
        1080,               //Width
        1920,               //Height
        BACKGROUND_COLOR    //Background color
    );

    var orbitControl = createOrbitController(camera, renderer);

    //Disable the use of the arrow keys on the keyboard
    orbitControl.enableKeys = false;
    //Disable panning the orbit controller (relative to the model)
    orbitControl.enablePan = false;

    //Update the renderer, scene and camera
    update(renderer, scene, camera, orbitControl);
}

function update(renderer, scene, camera, control)
{
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


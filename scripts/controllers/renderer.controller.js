function createRenderer(elementId, w, h, color)
{
    //Create renderer
    var renderer = new THREE.WebGLRenderer
    ({
        alpha: true,
        preserveDrawingBuffer: true
    });
    //Set renderer size
    renderer.setSize(w, h);
    //Set renderer background color
    renderer.setClearColor(color);
    //Enable renderer shadows
    renderer.shadowMap.enabled = true;
    //Grab the element on which the canvas needs to be rendered
    document.getElementById(elementId).appendChild(renderer.domElement);

    return renderer;
}

//Create a button that allows for taking screenshots
function createScreenshotButton(renderer, scene, camera)
{
    var button = document.createElement('input');
    button.innerHTML = "Take screenshot";
    button.type = "button";
    button.id = "get-snapshot";
    button.value = "Take Screenshot";

    button.addEventListener('click', function()
    {
        createModelSnapshot(renderer, scene, camera);
    });

    document.body.appendChild(button);
}

//Create the screenshot
function createModelSnapshot(renderer, scene, camera)
{
    //Open in new window like this
    var w = window.open('', '');
    w.document.title = "Screenshot";
    //w.document.body.style.backgroundColor = "red";
    var img = new Image();
    // Without 'preserveDrawingBuffer' set to true, we must render now
    renderer.render(scene, camera);
    img.src = renderer.domElement.toDataURL();
    w.document.body.appendChild(img);

    console.log("LOG: Screenshot Created");
}
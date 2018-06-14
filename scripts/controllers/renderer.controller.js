
let renderer = null;

function createRenderer(elementId, w, h, color)
{
    //Create renderer
    renderer = new THREE.WebGLRenderer
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
    console.log(elementId);
    //Grab the provided element and append the renderer
    $('#'+elementId).append(renderer.domElement);

    return renderer;
}

//Save the screenshot
function save()
{
    //Set the value of the hidden image to a snapshot of the renderer
    $("#hidden_image").val(renderer.domElement.toDataURL('image/png'));
    $("#image-form").submit();

    alert("De submit button werkt");
}

let renderer = null;
var exporter = null;

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
    //Grab the provided element and append the renderer
    $('#'+elementId).append(renderer.domElement);

    return renderer;
}

//Save the screenshot
function save_screenshot()
{
    //Set the value of the hidden image input value to a snapshot of the renderer
    $("#hidden_image").val(renderer.domElement.toDataURL('image/png'));

    //Set the value of the hidden model input value to a parse of the scene
    //Help: This value holds the raw OBJ data
    $("#hidden_model_input").val(save_model());

    $("#image-form").submit();
}

//Save the screenshot
function save_model()
{
    //Create a new exporter, parse the contents of the scene & return
    var result = new THREE.OBJExporter().parse(scene);
    return result;
}
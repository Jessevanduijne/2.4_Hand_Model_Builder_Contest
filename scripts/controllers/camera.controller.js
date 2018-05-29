//Create camera
function createCamera(x, y, z, perspective, ratio, nearClipping, farClipping)
{
    var camera = new THREE.PerspectiveCamera(
        perspective,
        ratio,
        nearClipping,
        farClipping
    );

    //Set the camera position x,y,z
    setCameraPosition(camera, z, y, x);

    console.log('LOG: Camera created');
    return camera;
}

//Set the camera position
function setCameraPosition(camera, x, y, z)
{
    //Set camera position
    camera.position.x = x;
    camera.position.y = y;
    camera.position.z = z;

    camera.lookAt(new THREE.Vector3(0, 0, 0));
}

function createOrbitController(camera, renderer)
{
    return new THREE.OrbitControls(camera, renderer.domElement);
}

//Load camera

//Update camera

//Delete camera
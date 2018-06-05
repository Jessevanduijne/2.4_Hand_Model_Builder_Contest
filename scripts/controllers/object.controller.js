//Rotate an object (and convert degrees to radians)
function rotateObject(object, degreeX=0, degreeY=0, degreeZ=0)
{
    var x = object.rotateX((degreeX * Math.PI)/180);
    var y = object.rotateY((degreeY * Math.PI)/180);
    var z = object.rotateZ((degreeZ * Math.PI)/180);

    return object;
}

function createPointLight(intensity, x, y, z, gui)
{
    //Initialize & declare a new point light
    var light = new THREE.PointLight('white', intensity);

    //Set the light position
    light.position.x = x;
    light.position.y = y;
    light.position.z = z;

    console.log('LOG: Point light created')
    return light;
}
//Rotate an object (and convert degrees to radians)
function rotateObject(object, degreeX=0, degreeY=0, degreeZ=0)
{
    degreeX = (degreeX * Math.PI)/180;
    degreeY = (degreeY * Math.PI)/180;
    degreeZ = (degreeZ * Math.PI)/180;

    object.rotateX(degreeX);
    object.rotateY(degreeY);
    object.rotateZ(degreeZ);
}

//Create a plane by size
function createPlane(size, color)
{
    var object = new THREE.PlaneGeometry(size, size);
    var material = new THREE.MeshPhongMaterial
    ({
        color: color,
        side: THREE.DoubleSide
    });

    var mesh = new THREE.Mesh(object, material);
    mesh.receiveShadow = true;

    console.log("LOG: Plane created");

    return mesh;
}

function createPointLight(intensity, x, y, z, gui)
{
    var light = new THREE.PointLight('white', intensity)
    light.position.x = x;
    light.position.y = y;
    light.position.z = z;

    light.castShadow = true;

    gui.add(light, 'intensity', 0, 3);
    gui.add(light.position, 'x', -10, 10);
    gui.add(light.position, 'y', 0.05, 20);
    gui.add(light.position, 'z', -10, 10);

    return light;
}
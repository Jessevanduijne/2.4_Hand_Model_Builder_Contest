//This class makes use of the STLLoader library ['/scripts/lib/STLLoader.js']
function loadModel(scene, path, color)
{
    //Create a new STLLoader
    var loader = new THREE.STLLoader();

    //Load the STL-file using the path
    loader.load(path, function (geometry)
    {
        //Create a new material
        var material = new THREE.MeshPhongMaterial
        ({
            color: color
        });

        //Create a mesh
        var mesh = new THREE.Mesh(geometry, material);

        //Add the mesh to the scene
        scene.add(mesh);

        //Rotate the custom model
        rotateObject(mesh, -90, 0, 0);

        //Move this somewhere else?
            //Scale the custom model
            var scale = 0.03;

            mesh.scale.x = scale;
            mesh.scale.y = scale;
            mesh.scale.z = scale;

            //Model Shadows
            mesh.castShadow = true;
            mesh.receiveShadow = true;

            console.log('LOG: Model loaded');
        return mesh;
    });
}
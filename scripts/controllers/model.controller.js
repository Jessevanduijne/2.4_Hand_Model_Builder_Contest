//This class makes use of the STLLoader library ['/scripts/lib/STLLoader.js']
//All functionality within this class is dedicated to manipulating the loaded model.

//Load the model (defined by path) into the desired scene
function loadModel(scene, path, color='gray', scale)
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
        var model = new THREE.Mesh(geometry, material);

        //Add the mesh to the scene
        scene.add(model);

        //Rotate the custom model
        rotateObject(model, -90, 0, 0);

        //Scale the custom model
        model.scale.x = scale;
        model.scale.y = scale;
        model.scale.z = scale;

        //Set model position
        model.position.x = 0;
        model.position.y = -0.5;
        model.position.z = 0;

        console.log('LOG: Model loaded');
        return model;
    });
}

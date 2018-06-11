//This class makes use of the STLLoader library ['/scripts/lib/STLLoader.js']
//All functionality within this class is dedicated to manipulating the loaded model.

//Load the model (defined by path) into the desired scene
function loadModel(scene, path, color='gray') {
    //Create a new STLLoader
    var loader = new THREE.OBJLoader();

    //Load the STL-file using the path
    loader.load(path, function (geometry) {
        //Create a new material
        var material = new THREE.MeshPhongMaterial
        ({
            color: color
        });

        //Add the mesh to the scene
        scene.add(geometry);

        //Rotate the custom model
        //rotateObject(geometry, -90, 0, 0);

        //Scale the custom model
        geometry.scale.set(0.02, 0.02, 0.02);

        //Set model position
        geometry.position.x = 0;
        geometry.position.y = 0.4;
        geometry.position.z = 0;

        //Rotate object by degrees (converted from radians to degrees in method)
        rotateObject(geometry, 0, 90, 0);

        geometry.name = "loadedModel"

        console.log('LOG: Model loaded');

        return geometry;
    });
}

function updateModel(scene){
    removeObject("loadedModel");
    loadModel(scene, HARDCODED_3DMODEL_PATH, DEFAULT_MODEL_COLOR);
}

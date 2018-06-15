//This class makes use of the STLLoader library ['/scripts/lib/STLLoader.js']
//All functionality within this class is dedicated to manipulating the 1

//Load the model (defined by path) into the desired scene
function loadModel(scene, path, modelColor, scale) {
    //Create a new STLLoader
    var loader = new THREE.OBJLoader();
    //Load the STL-file using the path
    loader.load(path, function (geometry) {
        //Create a new material
        var material = new THREE.MeshPhongMaterial
        ({
            color: modelColor
        });
        // kayleigh
        geometry.traverse(function(child){
          if (child instanceof THREE.Mesh) {
            child.material=material;
          }
        });

        //Add the mesh to the scene
        scene.add(geometry);

        console.log('LOG:', material);

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

function updateModel(scene, modelColor){
    removeObject("loadedModel");
    loadModel(scene, HARDCODED_3DMODEL_PATH, modelColor, 0.014);
}

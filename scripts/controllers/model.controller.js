//This class makes use of the STLLoader library ['/scripts/lib/STLLoader.js']
//All functionality within this class is dedicated to manipulating the 1

//Load the model (defined by path) into the desired scene
function loadModel(scene, path, modelColor, scale, standardcolor = 0xffffff,  image = null, text = null) {
    //Create a new STLLoader
    var loader = new THREE.OBJLoader();
    //Load the STL-file using the path
    loader.load(path, function (geometry) {

        //Create a new material
        var material = new THREE.MeshPhongMaterial({ color:modelColor});
        // kayleigh
        geometry.traverse(function(child){
          if (child instanceof THREE.Mesh) {
            child.material=material;
          }
        });

        console.log(material);
        //Add the mesh to the scene
        scene.add(geometry);
        //Scale the custom model
        geometry.scale.set(0.02, 0.02, 0.02);
        //Set model position
        geometry.position.x = 0;
        geometry.position.y = 1;
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
    loadModel(scene, HARDCODED_3DMODEL_PATH, modelColor, 0.03);
}

function UpdateMaterial(scene, standardColor, image, text){
  removeObject('loadedCube');
  createStandard(scene,standardColor,image,text);
}

function createStandard(scene,standardColor, image, text){
  var cubegeometry = new THREE.BoxGeometry(0.55,0.55,0.55);
  var cubematerial = createcubematerial(standardColor, image, text);
  var cube = new THREE.Mesh(cubegeometry,cubematerial);
  scene.add(cube);
  cube.position.x = 0;
  cube.position.y = 0;
  cube.position.z = 0;
  cube.name = 'loadedCube';
}

function createcubematerial(standardColor, image, text)
{
  var textTexture = null;
  var imageTexture = null;
  var cubematerials;
  var returnmaterial;

  if(text!=null)
  {
    var textTexture = new THREE.TextureLoader().load(TEXT_OPTIONS[text]);
    textTexture.minFilter = THREE.LinearFilter;
  }
  if(image!=null)
  {
    var imageTexture = new THREE.TextureLoader().load(IMAGE_OPTIONS[image]);
    imageTexture.minFilter = THREE.LinearFilter;
    console.log(imageTexture);
  }

  if((textTexture==null) && (imageTexture == null))
  {
    return new THREE.MeshPhongMaterial({color:standardColor});
  }else if((textTexture==null)&&(imageTexture!=null)){
    // all sides minus top and bottom, image
    cubematerials =
    [
      new THREE.MeshBasicMaterial({map:imageTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:imageTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({color: standardColor, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({color: standardColor, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:imageTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:imageTexture, side: THREE.DoubleSide})
    ];
    return cubematerials;
  }else if ((textTexture!=null)&&(imageTexture==null)) {
    // all sides text
    cubematerials =
    [
      new THREE.MeshBasicMaterial({map:textTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:textTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({color: standardColor, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({color: standardColor, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:textTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:textTexture, side: THREE.DoubleSide})
    ];
    return cubematerials;
  }else if ((textTexture!=null)&&imageTexture!=null) {
    // om en om
    cubematerials =
    [
      new THREE.MeshBasicMaterial({map:textTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:textTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({color: standardColor, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({color: standardColor, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:imageTexture, side: THREE.DoubleSide}),
      new THREE.MeshBasicMaterial({map:imageTexture, side: THREE.DoubleSide})
    ];
    return cubematerials;
  }

}

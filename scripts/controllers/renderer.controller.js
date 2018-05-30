function createRenderer(elementId, w, h, color)
{
    //Create renderer
    var renderer = new THREE.WebGLRenderer({ alpha: true });
    //Set renderer size
    renderer.setSize(w, h);
    //Set renderer background color
    renderer.setClearColor(color);
    //Enable renderer shadows
    renderer.shadowMap.enabled = true;
    //Grab the element on which the canvas needs to be rendered
    document.getElementById(elementId).appendChild(renderer.domElement);

    return renderer;
}
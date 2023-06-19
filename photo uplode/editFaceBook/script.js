var canvas = new fabric.Canvas('canvas');

function loadImage() {
  var fileInput = document.getElementById('image_upload');
  var file = fileInput.files[0];
  var reader = new FileReader();
  reader.onload = function(event) {
    var img = new Image();
    img.onload = function() {
      var fabricImg = new fabric.Image(img);
      canvas.clear();
      canvas.add(fabricImg);
      var crop = new fabric.Image.cropWithViewport(fabricImg, {
        width: canvas.width,
        height: canvas.height,
        left: 0,
        top: 0
      });
      canvas.setActiveObject(crop);
      canvas.requestRenderAll();
    };
    img.src = event.target.result;
  };
  reader.readAsDataURL(file);
}

function cropImage() {
  var selection = canvas.getActiveObject();
  var cropped = selection.toCanvasElement();
  canvas.clear();
  canvas.add(new fabric.Image(cropped));
}

function save() {
  var dataUrl = canvas.toDataURL();
  document.getElementById('image_data').value = dataUrl;
  document.forms[0].submit();
}

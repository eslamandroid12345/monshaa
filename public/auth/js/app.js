const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#file_upload')
              .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
  }
}

const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

chooseFile.addEventListener("change", function () {
  getImgData();
});

function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.display = "block";
      imgPreview.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
};


// function previewFiles(place, e) {
//   var preview = document.getElementById(place);
//   preview.innerHTML = ''; // Clear any existing previews
  
//   for (var i = 0; i < e.files.length; i++) {
//     var file = e.files[i];
//     var fileName = URL.createObjectURL(file);
//     var img = document.createElement('img');
//     img.src = fileName;
//     img.style.width = '100px'; // Set the size of the preview image
//     img.style.height = '100px';
//     img.style.marginRight = '10px'; // Add some spacing between images
//     preview.appendChild(img); // Add the image preview to the DOM
//   }
// }


$('.file-input').change(function(){
  var curElement = $(this).parent().parent().find('.image');
  console.log(curElement);
  var reader = new FileReader();

  reader.onload = function (e) {
      // get loaded data and render thumbnail.
      curElement.attr('src', e.target.result);
  };

  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
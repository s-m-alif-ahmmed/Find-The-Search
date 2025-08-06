

  // Select the input element with the id "phone"
  var input = document.querySelector("#phone");

  // Check if the input element exists before initializing intlTelInput
  if (input) {
    var iti = window.intlTelInput(input, {
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // Correct path
    });
  }

  // Password show and hide

  document.addEventListener("DOMContentLoaded", () => {
      const passwordInput = document?.getElementById("password");
      const toggleButton = document?.querySelector(".passHidden--wrapper");
      const toggleText = toggleButton?.querySelector("span");

      toggleButton?.addEventListener("click", () => {
          // Toggle password visibility
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
              toggleText.textContent = "Show";
          } else {
              passwordInput.type = "password";
              toggleText.textContent = "Hide";
          }
      });
  });

  document.addEventListener("DOMContentLoaded", () => {
      const passwordInput = document?.getElementById("confirm-password");
      const toggleButton = document?.querySelector(".confirm_pass-span");
      const toggleText = toggleButton?.querySelector("span");

      toggleButton?.addEventListener("click", () => {
          // Toggle password visibility
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
              toggleText.textContent = "Show";
          } else {
              passwordInput.type = "password";
              toggleText.textContent = "Hide";
          }
      });
  });



  function ShowingMenu() {
    let MenuClick = document.querySelector(".navbar--menu");
    let CloseBtn = document.querySelector('.close--btn');

    let ShowElements = document.querySelector('.main--menu--wrapper');
    let ShowMenu = document.querySelector('.main--menu--wrapper--inner');

    MenuClick?.addEventListener("click", function () {
        ShowElements.classList.add('show');

		setTimeout(function(){
			ShowMenu.classList.add('show');
		}, 200)
    });

    CloseBtn?.addEventListener('click', function () {
        ShowElements.classList.remove('show');

        ShowMenu.classList.remove('show');
    });
}
ShowingMenu();


function FileUploader(){

  const fileInput = document.getElementById('fileInput');
  const uploader = document.getElementById('uploader');
  const message = document.getElementById('message');
  const separator = document.getElementById('separator');
  const icon = document.getElementById('icon');

  // Handle file input change
  fileInput?.addEventListener('change', handleFile);

  // Make the entire div clickable
  uploader?.addEventListener('click', () => fileInput.click());

  // Handle drag-and-drop
  uploader?.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploader.style.backgroundColor = '#444';
  });

  uploader?.addEventListener('dragleave', () => {
    uploader.style.backgroundColor = '#333';
  });

  uploader?.addEventListener('drop', (e) => {
    e.preventDefault();
    uploader.style.backgroundColor = '#333';
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
      previewImage(file);
    }
  });

  // File handling function
  function handleFile(e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
      previewImage(file);
    }
  }

  // Preview the uploaded image
  function previewImage(file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      uploader.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image">`;
      uploader.classList.add('active');
    };
    reader.readAsDataURL(file);
  }
}
FileUploader()



// slider
$('.dashboard--banner--wrapper.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  autoplay: 1000,
  nav:false,
  dots: true,
  responsive:{
      0:{
          items:1,
          dots: false,
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
})



// Like UnLike
function LikeUnlike(){

  let Like = document.querySelector('.likees')
  let Unlike = document.querySelector('.unlikees')

  let MainLikeBtn = document.querySelector('.people--who--vote--svg')

  MainLikeBtn.addEventListener('click', function(){
    console.log("Clicked");
  })

}
// LikeUnlike()







// profile pic uploader
document.getElementById("profilePictureInput")?.addEventListener("change", function (event) {
  const file = event.target.files[0];
  const previewImg = document.getElementById("previewImg");
  const deleteBtn = document.getElementById("deleteBtn");

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImg.src = e.target.result;
      previewImg.style.display = "block";
      deleteBtn.hidden = false;
    };
    reader.readAsDataURL(file);
  }
});

document.getElementById("deleteBtn")?.addEventListener("click", function () {
  const previewImg = document.getElementById("previewImg");
  const inputFile = document.getElementById("profilePictureInput");

  previewImg.src = "";
  previewImg.style.display = "none";
  inputFile.value = ""; // Clear the input
  this.hidden = true; // Hide the delete button
});




// Dashboard Opener

const LeftBtn = document.querySelector('.btn--left--opener');
const LeftSideBar = document.querySelector('.dashboard--left--nav');

const RightBtn = document.querySelector('.btn--right--opener');
const RightSideBar = document.querySelector('.dashboard--right--nav');

LeftBtn?.addEventListener('click', function() {
  if (RightSideBar?.classList.contains('active')) {
    RightSideBar?.classList.remove('active'); // Close the right sidebar if it's open
  }
  LeftSideBar.classList.toggle('active'); // Toggle the left sidebar
});

RightBtn?.addEventListener('click', function() {
  if (LeftSideBar.classList.contains('active')) {
    LeftSideBar.classList.remove('active'); // Close the left sidebar if it's open
  }
  RightSideBar.classList.toggle('active'); // Toggle the right sidebar
});







// dashboard tabs
$('.dashboard--setting--wrapper')?.skeletabs({keyboard: false,});






// Smooth Scroll


// Initialize Lenis
const lenis = new Lenis({
	autoRaf: true,
});

  // Listen for the scroll event and log the event data
  lenis.on('scroll', (e) => {
	// console.log(e);
  });

function multiStepForm() {
    let pesignations = document.querySelectorAll(".pegisgnation--item");
    let next = document.querySelector(".nextBtn");
    let stepItem = document.querySelectorAll(".nr--step--item");
    let index = 0;
    
    // Function to update the active state of elements
    function updateActiveState() {
      // Remove 'active' class from all items
      stepItem.forEach((item) => item.classList.remove("active"));
    
      // Add 'active' class to the current items
      pesignations[index].classList.add("active");
      stepItem[index].classList.add("active");
    
      // Disable the 'Next' button if it's the last step
      next.disabled = index === stepItem.length - 1;
    }
    
    // Initial state
    updateActiveState();
    
    // Next button event listener
    next?.addEventListener("click", function () {
      if (index < stepItem.length - 1) {
        index++; // Increment the index
        updateActiveState(); // Update active state
      }
    });
  
  
  
    // Select the toggle items and content sections
    let toggleItems = document.querySelectorAll(".meritic");
    let contentItems = document.querySelectorAll(".nr--for--meritic--item");
  
  // Function to switch active content based on the active tab
    if(toggleItems && contentItems){
  
    toggleItems.forEach((item, index) => {
      item?.addEventListener("click", function () {
        // Remove 'active' class from all tabs
        toggleItems.forEach((el) => el.classList.remove("active"));
      
        // Add 'active' class to the clicked tab
        item.classList.add("active");
      
        // Hide all content sections
        contentItems.forEach((content) => content.classList.remove("visible"));
      
        // Show the content section corresponding to the active tab
        contentItems[index].classList.add("visible");
      });
    });
  }
  
  
  }
  
  multiStepForm();
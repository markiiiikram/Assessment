// COOKIE CONSENT
document.addEventListener("DOMContentLoaded", function () {
  const cookieConsent = document.getElementById("cookieConsent");
  const cookieOverlay = document.getElementById("cookieOverlay");
  const changeSettingsBtn = document.getElementById("cookie-change-settings");
  const acceptCookiesBtn = document.getElementById("cookie-accept");
  const body = document.body;

  // Function to show the cookie popup
  function showCookiePopup() {
    cookieOverlay.style.display = "block";
    cookieConsent.style.display = "block";
    body.style.overflow = "hidden"; // Disable scrolling
  }

  // Function to hide the cookie popup
  function hideCookiePopup() {
    cookieOverlay.style.display = "none";
    cookieConsent.style.display = "none";
    body.style.overflow = "auto"; // Re-enable scrolling
  }

  // Function to accept cookies
  function acceptCookies() {
    localStorage.setItem("cookieConsent", "true");
    setTimeout(function () {
      localStorage.removeItem("cookieConsent");
    }, 60000); // Remove after 1 minute (60000 milliseconds)
    hideCookiePopup();
  }

  // Event listener for accepting cookies
  acceptCookiesBtn.addEventListener("click", function () {
    acceptCookies();
  });

  // Event listener for clicks on the footer cookie element
  document
    .getElementById("footer-cookie")
    .addEventListener("click", function (event) {
      // Show the cookie popup when the footer cookie element is clicked
      showCookiePopup();
    });

  // Check if the user has already accepted cookies
  const hasConsent = localStorage.getItem("cookieConsent");
  if (hasConsent === "true") {
    hideCookiePopup();
  } else {
    showCookiePopup();
  }
});
//////////////////////////////////////
/// Burger button
// Function to toggle the sidebar
function toggleSidebar() {
  // Toggle the 'active' class on #main-container, #sidebar, #hamburger, #hamburger-low
  document
    .querySelectorAll("#main-container, #sidebar, #hamburger, #hamburger-low")
    .forEach(function (element) {
      element.classList.toggle("active");
    });

  // Toggle the 'active' class on the body
  document.body.classList.toggle("active");

  // Check if the sidebar is active
  if (document.getElementById("sidebar").classList.contains("active")) {
    // Prevent scrolling on the main container when sidebar is active
    document
      .getElementById("main-container")
      .addEventListener("scroll", preventScroll);
  } else {
    // Remove scroll prevention when sidebar is inactive
    document
      .getElementById("main-container")
      .removeEventListener("scroll", preventScroll);
  }
}

// Function to prevent scrolling on the main container
function preventScroll(event) {
  event.preventDefault();
}

// Function to remove the 'active' class from all relevant elements
function deactivateSidebar() {
  // Remove the 'active' class from #main-container, #sidebar, #hamburger, #hamburger-low, and the body
  document
    .querySelectorAll("#main-container, #sidebar, #hamburger, #hamburger-low")
    .forEach(function (element) {
      element.classList.remove("active");
    });
  document.body.classList.remove("active");
}

// Event listener for clicks on the document body
document.body.addEventListener("click", function (event) {
  // Check if the click target is outside of the sidebar
  if (
    !event.target.closest("#sidebar") &&
    !event.target.closest(".hamburger")
  ) {
    // Deactivate the sidebar by removing the 'active' class from all relevant elements
    deactivateSidebar();
    // Remove scroll prevention when sidebar is inactive
    document
      .getElementById("main-container")
      .removeEventListener("scroll", preventScroll);
  }
});

// Add event listener to both hamburger buttons
document.getElementById("hamburger").addEventListener("click", toggleSidebar);
document
  .getElementById("hamburger-low")
  .addEventListener("click", toggleSidebar);

/////////////////////////////////////
// NAV BAR - STICKY
var prevScrollPos = window.pageYOffset;
var header = document.querySelector(".header");

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollPos > currentScrollPos) {
    header.style.top = "0";
    header.style.position = "sticky";
  } else {
    header.style.top = "-100%";
  }
  prevScrollPos = currentScrollPos;
};

//////////////////////////////////////////
//Accordion
/////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  var accordionTriggers = document.querySelectorAll(".accordion-trigger");

  // Toggle accordion dropdown when the trigger is clicked
  accordionTriggers.forEach(function (trigger) {
    trigger.addEventListener("click", function () {
      // Toggle the 'active' class on the trigger
      this.classList.toggle("active");
    });
  });
});

/////////////////////////////////////////
//Validation for email input
////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("myForm");
  var enquiryButton = document.querySelector("button.enquiry"); // Get the "enquiry" button
  var emailInput = document.getElementById("your-email-contact"); // Get the email input field

  // Event listener for form submission
  enquiryButton.addEventListener("click", function (event) {
    var inputs = form.querySelectorAll(
      "#your-name-contact, #your-telephone, #message-container"
    );
    var isValid = true;

    inputs.forEach(function (input) {
      if (input.value.trim() === "") {
        input.classList.add("invalid");
        isValid = false; // Set isValid to false if any field is empty
      } else {
        input.classList.remove("invalid");
      }
    });

    // Check email format separately
    if (!isValidEmail(emailInput.value)) {
      emailInput.classList.add("invalid");
      isValid = false;
    } else {
      emailInput.classList.remove("invalid");
    }

    // Prevent form submission if any field is invalid
    if (!isValid) {
      event.preventDefault();
    }
  });

  // Event listener for input change
  form.addEventListener("input", function (event) {
    var input = event.target;
    if (input.matches("#your-name-contact, #message-container")) {
      if (input.value.trim() === "") {
        input.classList.add("invalid");
      } else {
        input.classList.remove("invalid");
      }
    } else if (input === emailInput) {
      // Check if the input is the email field
      if (!isValidEmail(emailInput.value)) {
        emailInput.classList.add("invalid");
      } else {
        emailInput.classList.remove("invalid");
      }
    } else if (input.id === "your-telephone") {
      // Check if the input is the telephone field
      if (!isValidTelephone(input.value)) {
        input.classList.add("invalid");
      } else {
        input.classList.remove("invalid");
      }
    }
  });

  function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function isValidTelephone(telephone) {
    var telephoneRegex = /^[#\d-]*$/; // Regex to allow only digits, #, and -
    return telephoneRegex.test(telephone);
  }
});

////////////////////////////////////
//////////// Close button
///////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  var closeButtons = document.querySelectorAll(
    ".error span.close, .success span.close"
  );

  closeButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var errorDiv = button.closest(".error, .success");
      if (errorDiv) {
        errorDiv.remove();
      }
    });
  });
});

////////////////////////////////////
//// Form Autoscroll
////////////////////////////////////

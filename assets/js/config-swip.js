// Swiper configuration object
const swiperConfig = {
  loop: true,
  speed: 600,
  autoplay: {
    delay: 5000,
  },
  slidesPerView: "auto",
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 40,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
  },
};

// Initialize Swiper with the configuration
const swiper = new Swiper(".init-swiper", swiperConfig);

//for four slider
// Swiper configuration object
const swiper2Config = {
  loop: true,
  speed: 600,
  autoplay: {
    delay: 5000,
  },
  slidesPerView: "auto",
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 40,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
  },
};
// Initialize Swiper with the configuration
const swiper2 = new Swiper(".init-swiper2", swiper2Config);

//for form registion progress section
let currentStep = 1;
const totalSteps = 3;

// Navigate to the next step
function nextStep() {
  const activeStep = document.querySelector(
    '.step:not([style*="display: none"])'
  );
  const nextStep = activeStep.nextElementSibling;

  if (nextStep) {
    activeStep.style.display = "none";
    nextStep.style.display = "block";

    // Update the progress bar
    currentStep++;
    updateProgressBar();
  }
}
// Navigate to the previous step
function prevStep() {
  const activeStep = document.querySelector(
    '.step:not([style*="display: none"])'
  );
  const prevStep = activeStep.previousElementSibling;

  if (prevStep) {
    activeStep.style.display = "none";
    prevStep.style.display = "block";

    // Update the progress bar
    currentStep--;
    updateProgressBar();
  }
}
// Update the progress bar based on the current step
function updateProgressBar() {
  const progressBar = document.getElementById("progressBar");
  const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
  progressBar.style.width = progress + "%";
  progressBar.setAttribute("aria-valuenow", progress);
}
//add of input field auto
let memberCount = 1; // Track the number of members

document
  .getElementById("add-member-btn")
  .addEventListener("click", function () {
    memberCount++;

    // Clone the hidden template
    let template = document
      .getElementById("team-member-template")
      .cloneNode(true);
    template.classList.remove("hidden");
    template.id = ""; // Remove ID to avoid duplication
    template.querySelector(".member-number").textContent = memberCount;

    // Append to team members container
    document.getElementById("team-members").appendChild(template);
  });

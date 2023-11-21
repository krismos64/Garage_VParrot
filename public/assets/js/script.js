// Animation for the welcome area using GSAP
gsap.from(".text-holder", {
  opacity: 0,
  duration: 2,
  y: -50,
  ease: "power2.out",
});
gsap.from(".img-holder", {
  opacity: 0,
  duration: 2,
  x: 50,
  ease: "power2.out",
  delay: 0.5,
});

// Animation for the features area using GSAP
gsap.from(".single-features-item", {
  opacity: 0,
  duration: 2,
  y: 50,
  ease: "power2.out",
  stagger: 0.2,
});

// Animation for the project area using GSAP
gsap.from(".single-project-item", {
  opacity: 0,
  duration: 2,
  y: 50,
  ease: "power2.out",
  stagger: 0.2,
});

// Animation for the slogan area using GSAP
gsap.from(".inner-content", {
  opacity: 0,
  duration: 2,
  y: 50,
  ease: "power2.out",
  delay: 0.5,
});

// Animation car page using GSAP
type =
  "module" >
  document.addEventListener("DOMContentLoaded", () => {
    // Animation for the main title
    gsap.from("#main-title", {
      opacity: 0,
      duration: 2,
      y: -50,
      ease: "power2.out",
    });

    // Animation for individual car cards
    gsap.from(".card", {
      opacity: 0,
      duration: 2,
      y: 50,
      ease: "power2.out",
      stagger: 0.2,
    });
  });
// Animation for individual service items
type =
  "module" >
  document.addEventListener("DOMContentLoaded", () => {
    gsap.from(".single-service-item", {
      opacity: 0,
      scale: 0.5,
      duration: 2,
      stagger: 0.2,
      ease: "power2.out",
    });
  });
// Animation for pricing boxes
type =
  "module" >
  document.addEventListener("DOMContentLoaded", () => {
    gsap.from(".pricing-box", {
      opacity: 0,
      scale: 0.5,
      duration: 1,
      stagger: 0.2,
      ease: "power2.out",
    });
  });
// Animation for FAQ
gsap.from(".single-item", {
  opacity: 0,
  y: 50,
  stagger: 0.2, // Add a stagger effect for a better visual appeal
  duration: 1,
  ease: "power2.out", // You can choose other easing functions
});

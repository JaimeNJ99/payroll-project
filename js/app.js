const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".navigation");

hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active")
})
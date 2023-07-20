const burger = document.querySelector(".burger");
const navBar = document.querySelector("nav");

burger.addEventListener("click", () => {
	burger.classList.toggle("active");
	navBar.classList.toggle("open");
});


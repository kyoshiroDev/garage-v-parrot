const burger = document.querySelector(".ligne");
const navBar = document.querySelector("nav");

burger.addEventListener("click", () => {
	burger.classList.toggle("active");
	navBar.classList.toggle("open");
});


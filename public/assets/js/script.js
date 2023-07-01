const burger = document.querySelector(".burger");
const navBar = document.querySelector("nav");

burger.addEventListener("click", () => {
	navBar.classList.toggle("open");
});

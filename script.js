const wrapper = document.querySelector(".wrapper");
const header = document.querySelector(".header");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const btnPopup = document.querySelector(".btnLogin");
const iconClose = document.querySelector(".icon-close");

registerLink.addEventListener("click", () => {
	wrapper.classList.add("active");
});

loginLink.addEventListener("click", () => {
	wrapper.classList.remove("active");
});

btnPopup.addEventListener("click", () => {
	wrapper.classList.add("active-popup");
	header.classList.add("disable-header");
});

iconClose.addEventListener("click", () => {
	wrapper.classList.remove("active-popup");
	header.classList.remove("disable-header");
});

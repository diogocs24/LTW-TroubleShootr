var icon = document.getElementById("dark-mode-icon");

icon.onclick = function () {
	document.body.classList.toggle("dark-theme");
	if (document.body.classList.contains("dark-theme")) {
		icon.src = "sunny-outline.svg";
	} else {
		icon.src = "moon-outline.svg";
	}
};

const isDarkMode = icon.src === "sunny-outline.svg";
if (isDarkMode) {
    document.body.classList.add("dark-theme");
} else {
    document.body.classList.remove("dark-theme");
}
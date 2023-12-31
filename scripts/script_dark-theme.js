
function darkmode() {
	const icon = document.querySelector('#dark-mode-icon');
  const wasDarkmode = localStorage.getItem('darkmode') === 'true';
  localStorage.setItem('darkmode', !wasDarkmode);
  const element = document.body;
  element.classList.toggle('dark-mode', !wasDarkmode);
  if (wasDarkmode) {
    icon.setAttribute('src', "/../images/moon-outline.svg");
  } else {
    icon.setAttribute('src', "/../images/sunny-outline.svg");
  }
}

function onload1() {
	const icon = document.querySelector('#dark-mode-icon');
	const wasDarkmode = localStorage.getItem('darkmode') === 'true';
	const element = document.body;
	element.classList.toggle('dark-mode', wasDarkmode);
	if (wasDarkmode) {
		icon.setAttribute('src', "/../images/sunny-outline.svg");
	  } 
	else {
		icon.setAttribute('src', "/../images/moon-outline.svg");
	}
}
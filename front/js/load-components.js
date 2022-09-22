import {loadComponent} from './script.js'

const setupPath = () => {
	if (location.hash === "#home"){
		return "./front/html/components/";
	}	else if ( location.hash === "#services"){
		return "../components/";
	} else{
		return "./components/";
	}
}

const path = setupPath();


loadComponent("#header", path + "header.html", "replace");
loadComponent("#footer", path + "footer.html", "replace");


// let stickyNavTop = document.querySelector("header").offsetTop;

// document.addEventListener("scroll", () => {
// 	if (window.pageYOffset > stickyNavTop) {
// 		document.querySelector("header").classList.add("fixed-header");
// 	} else {
// 		document.querySelector("header").classList.remove("fixed-header");
// 	}
// });
		
		
// console.log('stickyNavTop', stickyNavTop);
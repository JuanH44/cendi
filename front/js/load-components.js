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
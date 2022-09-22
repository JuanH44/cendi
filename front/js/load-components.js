const getPathPrefix = () => {
	if (location.hash === "#home"){
		return "./front/";
	}	else if ( location.hash === "#services"){
		return "../";
	} else{
		return "./";
	}
}

const pathPrefix = getPathPrefix();

const loadComponent = async(target, componentURL, option) => {
	const off = componentURL.indexOf(" ");
	
	let selector;

	if (off > 0) {
		URL = componentURL.substring(0, off);
		selector = componentURL.substring(off + 1);
	}else {
		URL = componentURL;
		selector = "";
	}

	try{
		const data = await fetch(URL);
		const template = await data.text();
		let element;

		const component = parseHTML(template);
		const configuredComponent = replaceImgSrc(component, pathPrefix);
		if (selector) {
			element = component.querySelector(selector);
		} else {
			element = component;
		}
		console.log("Listo para cargar");
		document.addEventListener("DOMContentLoaded", () => {
			console.log("Cargando");
			const elementTarget = document.querySelector(target);
			if (option === "append" || option === 0 || option === undefined ) {
				elementTarget.append(element);
			}
			if (option === "replace" || option === 1) {
				elementTarget.replaceWith(element);
			}
		});
	}	catch(error){
		console.log(error);
	}
}

const parseHTML = (html) => {
	const template =  document.createElement("template");
	template.innerHTML = html;
	return template.content;
}

const displayElements = (state,...selectors) => {
	for (const selector of selectors) {
		const element = document.querySelector(selector);
		
		element.hidden = !state;  //for display true = !false
	}
}

// replace  all src of img in html template
const replaceImgSrc = (html, src) => {
	// const template = document.createElement("template");
	// template.innerHTML = html;
	const imgs = html.querySelectorAll("[src]");
	
	imgs.forEach(img => {
		const srcAttr = img.getAttribute("src");
		img.setAttribute("src", src + srcAttr);
	});
	
	return html;
}


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
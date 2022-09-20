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

export const loadComponent = async(target, componentURL, option) => {
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

		const elementTarget = document.querySelector(target);
		if (option === "append" || option === 0 || option === undefined ) {
			elementTarget.append(element);
		}
		if (option === "replace" || option === 1) {
			elementTarget.replaceWith(element);
		}

	}	catch(error){
		console.log(error);
	}
}

export const parseHTML = (html) => {
	const template =  document.createElement("template");
	template.innerHTML = html;
	return template.content;
}

export const displayElements = (state,...selectors) => {
	for (const selector of selectors) {
		const element = document.querySelector(selector);
		
		element.hidden = !state;  //for diplay true = !false
	}
}

// replace  all src of img in html template
export const replaceImgSrc = (html, src) => {
	// const template = document.createElement("template");
	// template.innerHTML = html;
	const imgs = html.querySelectorAll("[src]");
	
	imgs.forEach(img => {
		const srcAttr = img.getAttribute("src");
		img.setAttribute("src", src + srcAttr);
	});
	
	return html;
}

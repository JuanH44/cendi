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

loadComponent("#header", "./components/header.html", "replace");
loadComponent("#footer", "./components/footer.html", "replace");

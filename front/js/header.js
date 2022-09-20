

    let offcanvas_pane = document.getElementById("offcanvasNavbar");
    let btn_login = document.getElementById("btn_login");

    offcanvas_pane.addEventListener("show.bs.offcanvas", function () {
      btn_login.classList.add("invisible");
    });

    offcanvas_pane.addEventListener("hide.bs.offcanvas", function () {
      btn_login.classList.remove("invisible");
    });

		let stickyNavTop = querySelector("header").offsetTop;
		
		
		console.log('stickyNavTop', stickyNavTop);



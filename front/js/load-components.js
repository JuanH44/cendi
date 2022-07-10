
$(document).ready(function () {

    let dir = window.location.pathname.split('/'); 
    let folder = "";
   
    if (dir[dir.length-2] == 'services') {
        folder = ".";
    }

    function chnageDir(){
        if (dir[dir.length-2] == 'services') {
            $("a[href^='./']").each(function(){
                $(this).attr('href', $(this).attr('href').replace('./', '../'));
            }
            );
            $("script[src^='./']").each(function(){
                $(this).attr('src', $(this).attr('src').replace('./', '../'));
            }
            );
            $("link[href^='./']").each(function(){
                $(this).attr('href', $(this).attr('href').replace('./', '../'));
            }
            );
            $("img[src^='../']").each(function(){
                $(this).attr('src', $(this).attr('src').replace('../', '../../'));
            }
            );
            console.log("Listo x");
            //alert("Listo rs");
            console.log("Listo a");
       }

    }
   
    

    //Importaciones
    function chDir(){
        $("#navigation").load(folder+"./components/barranav.html");
        $("#footer").load(folder+"./components/footer.html");
        console.log("Listo y");
    }

    const cDir = () => {
        return new Promise((resolve)=>{
            chDir()
                resolve("Hola &&");

    })};
    //Cambio de direcciones

    async function cambioDir(){
        let mensaje = await cDir();
        chnageDir();
        alert(mensaje);   
    }

    async function sleep (){
        await new Promise(resolve => setTimeout(resolve, 1000));
    }

    // sleep().then(()=>{
    //     alert("Listo");
     
    // }  );


    async function cambioDir2(){
       await new Promise(resolve => {
        $("#navigation").load(folder+"./components/barranav.html");
        $("#footer").load(folder+"./components/footer.html");
       
        resolve("Hola &&");
       }

       );
    }

    cambioDir2().then(async ()=>{
        // alert("Listo #");
        await sleep();
        chnageDir();
        // alert($("#b_a").attr("href"));

    }
    );


});

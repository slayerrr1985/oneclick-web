
document.querySelector("#ham-button").addEventListener('click',function(){
    let menu = document.querySelector("nav");
    menu.classList.toggle("hide");
    /*menu.setAttribute("style","display:none");*/
    console.log(menu.style.display)
});
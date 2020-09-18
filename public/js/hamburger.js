// function toggleNav() {
//     var body = document.body;
//     var hamburger = document.getElementById('js-hamburger');
//     var blackBg = document.getElementById('js-black-bg');

//     hamburger.addEventListener('click', function() {
//         body.classList.toggle('nav-open');
//         console.log("ok");
//     });
//     blackBg.addEventListener('click', function() {
//         body.classList.remove('nav-open');
//     });
// }
// toggleNav();

function isHamburgerMenu(){
    if(document.getElementsByClassName("slidex")[0]){
        hamburger();
    }
}

function hamburger(){
    document.getElementById("line0").classList.toggle("linea");
    document.getElementById("line1").classList.toggle("lineb");
    document.getElementById("line2").classList.toggle("linec");
    document.getElementById("hum_target").classList.toggle("slidex");
    document.getElementById('nav_f').classList.toggle('fadein');
    if(document.getElementById("line0").classList.contains("linea")
    || document.getElementById("line0").classList.contains("lineb")
    || document.getElementById("line0").classList.contains("linec")){
        // document.getElementById("line0").style.background = "#ffffff";
        // document.getElementById("line1").style.background = "#ffffff";
        // document.getElementById("line2").style.background = "#ffffff";
        document.getElementById("hum_target").style.background = "#636363";
        document.getElementsByClassName("hum_t_i_0")[0].style.top = "13px";
        document.getElementsByClassName("hum_t_i_2")[0].style.top = "13px";
    }else{
        // document.getElementById("line0").style.background = "#636363";
        // document.getElementById("line1").style.background = "#636363";
        // document.getElementById("line2").style.background = "#636363";
        document.getElementById("hum_target").style.background = "black";
        document.getElementsByClassName("hum_t_i_0")[0].style.top = "0px";
        document.getElementsByClassName("hum_t_i_2")[0].style.top = "26px";
    }
}

document.getElementById("hum_target").addEventListener("click", hamburger, false);

document.getElementsByClassName("header")[0].addEventListener("click", isHamburgerMenu, false);
document.getElementsByClassName("main")[0].addEventListener("click", isHamburgerMenu, false);
document.getElementsByClassName("footer")[0].addEventListener("click", isHamburgerMenu, false);

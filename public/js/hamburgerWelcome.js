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


function hamburger(){
    document.getElementById("line0").classList.toggle("linea");
    document.getElementById("line1").classList.toggle("lineb");
    document.getElementById("line2").classList.toggle("linec");
    document.getElementById("hum_target").classList.toggle("slidex");
    document.getElementById('nav_f').classList.toggle('fadein');
    if(document.getElementById("line0").classList.contains("linea")
    || document.getElementById("line0").classList.contains("lineb")
    || document.getElementById("line0").classList.contains("linec")){
        // オープン状態
        // document.getElementById("line0").style.background = "#ffffff";
        // document.getElementById("line1").style.background = "#ffffff";
        // document.getElementById("line2").style.background = "#ffffff";
        // document.getElementById("hum_target").style.background = "rgba(99, 99, 99, .01)";
        document.getElementById("hamburger_menu").style.zIndex = "998";
        document.getElementsByClassName("hum_t_i_0")[0].style.top = "13px";
        document.getElementsByClassName("hum_t_i_2")[0].style.top = "13px";
    }else{
        // クローズ状態
        // document.getElementById("line0").style.background = "#636363";
        // document.getElementById("line1").style.background = "#636363";
        // document.getElementById("line2").style.background = "#636363";
        // document.getElementById("hum_target").style.background = "rgba(0, 0, 0, .3)";
        setTimeout(() => {
            document.getElementById("hamburger_menu").style.zIndex = "-999";
        }, 300);
        document.getElementsByClassName("hum_t_i_0")[0].style.top = "0px";
        document.getElementsByClassName("hum_t_i_2")[0].style.top = "26px";
    }
}

function isHamburgerMenu(){
    if(document.getElementsByClassName("slidex")[0]){
        hamburger();
    }
}



// document.body.addEventListener("click", function(event){
//     if(event.target == document.getElementById("hum_target")){
//         hamburger();
//     }else if(event.target == document.getElementsByClassName("header")[0]
//     || event.target == document.getElementsByClassName("main")[0]
//     || event.target == document.getElementsByClassName("footer")[0]){
//         isHamburgerMenu();
//     }else if(event.target == document.getElementById("welcome_section")){
//         isHamburgerMenu();
//     }
// });

document.getElementById("hum_target").addEventListener("click", hamburger, false);

document.getElementById("welcome_section").addEventListener("click", isHamburgerMenu, false);
document.getElementsByClassName("footer")[0].addEventListener("click", isHamburgerMenu, false);

// document.body.addEventListener("click", function(event){
//     console.log(event.target); //クリックした要素を検出してます。
//     if(event.target==document.getElementById("hum_target") || event.target==document.getElementsByClassName("hum_t_inner")[0] || event.target==document.getElementsByClassName("hum_t_i_0")[0] || event.target==document.getElementsByClassName("hum_t_i_1")[0] || event.target==document.getElementsByClassName("hum_t_i_2")[0]){
//         hamburger();
//     }else if(document.getElementById("hum_target").classList.contains("slidex") && event.target==document.getElementById("hamburger_menu")){
//         console.log("Nothing.");
//     }else if(document.getElementById("hum_target").classList.contains("slidex") && event.target!=document.getElementById("hamburger_menu")){
//         hamburger();
//     }
// });
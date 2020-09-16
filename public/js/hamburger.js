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
}

document.getElementById("hum_target").addEventListener("click", function(){
    hamburger();
}, false);
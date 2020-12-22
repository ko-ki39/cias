function hoge() {
    $("body").quietflow({
        theme: "starfield",
        starSize: 1.2,
        speed: 60
    });
}

window.onload = hoge();
document.body.addEventListener("resize", hoge);
document.body.addEventListener("scroll", hoge);
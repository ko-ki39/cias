function hoge() {
    $("html").quietflow({
        theme: "starfield",
        starSize: 1.2,
        speed: 60
    });
}

window.onload = hoge();
window.addEventListener("resize", hoge);
window.addEventListener("scroll", hoge);
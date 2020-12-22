function hoge() {
    let bodyWitdh = document.body.getBoundingClientRect().width;
    let bodyHeight = document.body.getBoundingClientRect().height;
    document.getElementById("quietflowOnBody").style.position = "fixed";
    document.getElementById("quietflowOnBody").style.width = bodyWitdh + "px";
    document.getElementById("quietflowOnBody").style.height = bodyHeight + "px";
    document.getElementById("quietflowOnBody").style.top = 0;
    document.getElementById("quietflowOnBody").style.left = 0;
    document.getElementById("quietflowOnBody").style.zIndex = "-9999";
    
    $("#quietflowOnBody").quietflow({
        theme: "starfield",
        starSize: 1.2,
        speed: 60
    });
}

window.onload = hoge();
// window.addEventListener("resize", hoge);
// window.addEventListener("scroll", hoge);
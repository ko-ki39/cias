var age = document.getElementsByClassName("age");
var num = document.getElementsByClassName("num");
var date = document.getElementsByClassName("date");
document.getElementById("department").addEventListener("change", (e) => {
    if (e.target.value == 9) { //管理者用アカウントを選択すると
        for (var i = 0; i < 2; i++) { //学年、人数、期限を消す
            age[i].style.display = "none";
            num[i].style.display = "none";
            date[i].style.display = "none";
        } //入力必須を解除
        age[1].required = false;
        num[1].required = false;
        date[1].required = false;
    } else {
        for (var i = 0; i < 2; i++) { //学年、人数、期限を表示する
            age[i].style.display = "";
            num[i].style.display = "";
            date[i].style.display = "";
        }
        //入力必須にする
        age[1].required = true;
        num[1].required = true;
        date[1].required = true;
    }
})

// document.getElementById("generate").onclick = function() {
//     console.log("生成");
// }
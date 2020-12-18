const { functionsIn } = require("lodash");

//確認用アラートを出すjsファイルです
function user_create() {
    message = confirm("ユーザーアカウントを生成します");

    if (message) {
        document.getElementById("back").style.display = ""; //戻るボタンを出す

        var age = document.getElementsByClassName("age");
        var num = document.getElementsByClassName("num");
        var date = document.getElementsByClassName("date");
        var department_c = document.getElementsByClassName("department_c");
        var generate = document.getElementById("generate");

        for (var i = 0; i < 2; i++) { //学年、人数、期限を表示する
            age[i].style.display = "none";
            num[i].style.display = "none";
            date[i].style.display = "none";
            department_c[i].style.display = "none";
        }

        generate.style.display = "none";
        return true;
    } else {

        return false;
    }
}

function user_delete() {
    message = confirm("選択したユーザーを削除しますか？");

    if (message) {
        return true;
    } else {
        return false;
    }
}

function article_delete(title) {
    message = confirm("選択した記事を削除しますか？");
    if (message) {
        return true;
    } else {
        return false;
    }
}

function article_edit() {
    message = confirm("記事の編集を確定しますか？");
    if (message) {
        return true;
    } else {
        return false;
    }
}

function article_upload() {
    message = confirm("記事を投稿します");
    if (message) {
        return true;
    } else {
        return false;
    }
}

function comment_delete() {
    message = confirm("選択したコメントを削除しますか？");
    if (message) {
        return true;
    } else {
        return false;
    }
}
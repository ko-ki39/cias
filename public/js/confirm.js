const { functionsIn } = require("lodash");

//確認用アラートを出すjsファイルです
function user_create() {
    message = confirm("ユーザーアカウントを生成します");

    if (message) {
        console.log("si");
        location.replace("http://www.htmq.com/js/location_replace.shtml");
        return true;
    } else {

        return false;
    }
}

function user_delete(user) {
    message = confirm(user + "このユーザーを削除しますか？");

    if (message) {
        return true;
    } else {
        return false;
    }
}

function article_delete(title) {
    message = confirm(title + " この記事を削除しますか？");
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
    message = confirm("コメントを削除しますか？");
    if (message) {
        return true;
    } else {
        return false;
    }
}
const { functionsIn } = require("lodash");

//確認用アラートを出すjsファイルです
function user_create() {
    message = confirm("ユーザーアカウントを生成します");

    if (message) {
        // console.log("si");
        // location.replace("http://localhost/admin");
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
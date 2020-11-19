var searchText = getParam('search'); //クエリパラメータ取得する関数
var searchList = getParam('search_list');

(window.onload = function() { //選択を保持する処理
    var select = document.getElementById('search_list');

    document.getElementById('search').value = searchText;
    switch (searchList) {
        case '1':
            select.options[0].selected = true;
            break;
        case '2':
            select.options[1].selected = true;
            break;
        case '3':
            select.options[2].selected = true;
            break;
        default:
            select.options[0].selected = true;
            break;
    }
})



function getParam(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
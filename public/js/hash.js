var search = document.getElementById('search');
search.addEventListener('keyup', function() {
    var search_id = document.getElementById('search_result');
    if (search.value.charAt(0) == '#') { //一文字目が#の時
        $.ajax({
            type: 'GET',
            url: '/top/hashtag',
            data: {
                'hashtag': search.value.slice(1), //文字列の一文字目削除(#)
            },
        }).done(function(data) { //成功した時の処理
            search_id.innerHTML = null; //処理が複数回走った場合のリセット
            for (var i = 0; i < data.length; i++) {
                html = `<a href="/top/hashtag/${data[i].hashtag_contents}"><li>${data[i].hashtag_contents}</li></a>`; //html生成
                search_id.insertAdjacentHTML("beforeend", html); //すでにある要素の下に入れる
            }
            console.log(data);
        }).fail(function() {

        })
    } else {
        search_id.innerHTML = null; //# が削除された場合の削除
    }
})

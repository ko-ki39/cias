var search = document.getElementById('search');
search.addEventListener('keyup', function() {
    if (search.value.charAt(0) == '#') { //一文字目が#の時
        $.ajax({
            type: 'GET',
            url: '/top/hashtag',
            data: {
                'hashtag': search.value.slice(1), //文字列の一文字目削除(#)
            },
        }).done(function(data) {
            for (var i = 0; i < data.length; i++) {
                console.log(data[i].hashtag_contents);
            }
        }).fail(function() {

        })
    }
})

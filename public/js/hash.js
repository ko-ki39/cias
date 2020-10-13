var search = document.getElementById('search');
search.addEventListener('keyup', function() {
    if (search.value == '#') {
        $.ajax({
            type: 'GET',
            url: 'top/' + hashTag,
            data: {
                'hashTag':
            }
        })
    }
})

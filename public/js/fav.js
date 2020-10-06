


let buttons = document.getElementsByClassName("heart-button-l");
let article = document.getElementsByClassName("article");
// console.log(buttons);
// buttons[0].classList.remove("far");
// buttons[0].classList.add("fas");

for(let i=0; i<article.length; i++){
    buttons[i].addEventListener("click", function(e){
        // console.log(e.target.classList);
        // console.log(buttons[i].classList);
    
        // 塗り潰しされてない(favされてない、またはログインしていない)
        if(buttons[i].classList[3] == "far"){
            favAdd();
            // requestTest();
        // 塗り潰しされてる(過去にお気に入りした)
        }else if(buttons[i].classList[3] == "fas"){
            favRemove();
        }
    }, false);
}

function requestTest(){
    $(function(){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        let article_id = $('input[name="article-id"]').val();
        $.ajax({
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "GET",
            url: "/top/fav/test/" + article_id,
            data: {
                article_id: article_id,
                _method: "POST"
            }
        })
        .done(function(){
            buttons[article_id-1].classList.remove("far");
            buttons[article_id-1].classList.add("fas");
        })
        .fail(function(){
            alert("通信エラー");
        })
    })
}

function favAdd(){
    let article_id = $('input[name="article-id"]').val();
    let method = "create";
    $.ajaxSetup({
        type: "POST",
        dataType: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    let req_json = {
        _article_id: article_id,
        _method: method,
    };
    $.ajax({
        data: JSON.stringify(req_json),
        url: "/top/fav/" + article_id,
    })
    .done(function(resData, jqXHR){
        console.log(jqXHR.status);
        console.log(resData);
        buttons[article_id-1].classList.remove("far");
        buttons[article_id-1].classList.add("fas");
    })
    .fail(function(error){
        console.log("通信エラー", error);
    })
}

function favRemove(){
    let article_id = $('input[name="article-id"]').val();
    let method = "delete";
    $.ajaxSetup({
        type: "POST",
        dataType: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    let req_json = {
        _article_id: article_id,
        _method: method,
    };
    $.ajax({
        data: JSON.stringify(req_json),
        url: "/top/fav/" + article_id,
    })
    .done(function(resData, jqXHR){
        console.log(jqXHR.status);
        console.log(resData);
        buttons[article_id-1].classList.remove("fas");
        buttons[article_id-1].classList.add("far");
    })
    .fail(function(){
        alert("通信エラー");
    })
}

// $(function(){
    //     $("#heart-button").click(
        //         function(){
            //             $.ajax({
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 url:,
//                 type: "POST",
//                 dataType: "JSON",
//             })
//         }
//     )
// })
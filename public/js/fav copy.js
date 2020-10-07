


let buttons = document.getElementsByClassName("heart-button-l");
let article = document.getElementsByClassName("article");
// console.log(buttons);
// buttons[0].classList.remove("far");
// buttons[0].classList.add("fas");

for(let i=0; i<article.length; i++){
    buttons[i].addEventListener("click", function(e){
        console.log(e.target.classList);
        console.log(buttons[i].classList);
    
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
            type: "POST",
            url: "/top/fav/test/" + article_id,
            data: {
                "article_id": article_id,
                "_method": "POST"
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
    $(function(){
        let article_id = $('input[name="article-id"]').val();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        let req_json = {
            "_article_id": article_id,
            "_method": "create"
        };
        $.ajax({
            url: "/top/fav/" + article_id,
            type: "POST",
            dataType: "json",
            data:JSON.stringify(req_json)
        })
        .done(function(resData, textStatus, jqXHR){
            console.log(jqXHR.status);
            console.log(resData.method);
            console.log(resData.message);
            buttons[article_id-1].classList.remove("far");
            buttons[article_id-1].classList.add("fas");
        })
        .fail(function(){
            alert("通信エラー");
        })
    })
}

function favRemove(){
    $(function(){
        let article_id = $('input[name="article-id"]').val();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        let req_json = {
            "_article_id": article_id,
            "_method": "delete"
        };
        $.ajax({
            url: "/top/fav/" + article_id,
            type: "POST",
            dataType: "json",
            data:JSON.stringify(req_json)
        })
        .done(function(resData, textStatus, jqXHR){
            console.log(jqXHR.status);
            console.log(resData.method);
            console.log(resData.message);
            buttons[i].classList.remove("fas");
            buttons[i].classList.add("far");
        })
        .fail(function(){
            alert("通信エラー");
        })
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
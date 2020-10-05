


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
            
        // 塗り潰しされてる(過去にお気に入りした)
        }else if(buttons[i].classList[3] == "fas"){
            buttons[i].classList.remove("fas");
            buttons[i].classList.add("far");
        }
    }, false);
}

function favAdd(){
    $(function(){
        let article_id = $('input[name="article-id"]').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/top/fav" + article_id,
            type: "POST",
            data: {
                "article_id": article_id,
                "_method": "CREATE"
            }
        })
        .done(function(){
            buttons[i].classList.remove("far");
            buttons[i].classList.add("fas");
        })
    })
}

function favRemove(){
    $(function(){
        let article_id = $('input[name="article-id"]').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/top/fav" + article_id,
            type: "POST",
            data: {
                "article_id": article_id,
                "_method": "DELETE"
            }
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
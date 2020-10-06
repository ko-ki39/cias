


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
            fav(i, "create");
            // requestTest();
        // 塗り潰しされてる(過去にお気に入りした)
        }else if(buttons[i].classList[3] == "fas"){
            fav(i, "delete");
        }
    }, false);
}

// function requestTest(){
//     $(function(){
//         $.ajaxSetup({
//             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
//         })
//         let article_id = $('input[name="article-id"]').val();
//         $.ajax({
//             // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//             type: "GET",
//             url: "/top/fav/test/" + article_id,
//             data: {
//                 article_id: article_id,
//                 _method: "POST"
//             }
//         })
//         .done(function(){
//             buttons[article_id-1].classList.remove("far");
//             buttons[article_id-1].classList.add("fas");
//         })
//         .fail(function(){
//             alert("通信エラー");
//         })
//     })
// }

function fav(select, m_sting){
    let article_id = document.getElementsByClassName("article_ajax_id")[select].value;
    let _method = m_sting;

    let formData = new FormData();
    formData.append("p_article_id", article_id);
    formData.append("p_method", _method)

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    $.ajax({
        url: "/top/fav/" + article_id,
        method: "post",
        data: formData,
        processData: false,
        contentType: false,
    })
    .done(function(resData, jqXHR){
        if(resData.success_flag == "ok"){
            switch(resData.p_method){
                case "create":
                    buttons[select].classList.remove("far");
                    buttons[select].classList.add("fas");
                    break;
                case "delete":
                    buttons[select].classList.remove("fas");
                    buttons[select].classList.add("far");
                    break;
                case "exists":
                    break;
            }
            console.log(resData.message);
            console.log("method is: " + resData.p_method);
            console.log("article_id id: " + resData.p_article_id);
        }else if(resData.success_flag == "plz_login"){
            console.log(resData.message);
        }else if(resData.success_flag == "omg"){
            console.log(resData.message);
        }
    })
    .fail(function(error){
        console.log("通信エラー", error);
    })
}

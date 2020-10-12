


let yajuu = document.getElementsByClassName("tippy_template")[0].innerHTML;
let buttons = document.getElementsByClassName("heart-button-l");
let article = document.getElementsByClassName("article");
// console.log(buttons);
// buttons[0].classList.remove("far");
// buttons[0].classList.add("fas");


/**
 * イベントリスナー
 */
for(let i=0; i<article.length; i++){
    buttons[i].addEventListener("click", function(e){
        // console.log(e.target.classList);
        // console.log(buttons[i].classList);
        
        // 塗り潰しされてない(favされてない、またはログインしていない)
        if(buttons[i].classList[4] == "far"){
            fav(i, "create");
            // requestTest();
            // 塗り潰しされてる(過去にお気に入りした)
        }else if(buttons[i].classList[4] == "fas"){
            fav(i, "delete");
        }
    }, false);
}

for(let j=0; j<article.length; j++){
    buttons[j].addEventListener("mouseover", function(e){
        if(buttons[j].classList[3] == "tippyLogin"){
            tippy_L();
        }else if(buttons[j].classList[3] == "tippyGuest"){
            tippy_G();
        }
    });
}



/**
 * Play Ground (^^)
 */
// select   :   選択した記事のID(整数)
// m_string :   イベントリスナーのクロージャーから受け取ったメソッド名(文字列)
function fav(select, m_sting){
    let article_id = document.getElementsByClassName("article_ajax_id")[select].value;
    let _method = m_sting;

    // JSONでリクエストしても、Controller側でnullになってしまうので、FormData使ってます
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
        // data: {"p_article_id": article_id, "p_method": _method},
        processData: false,
        contentType: false,
    })
    // resData: ControllerからresponseしたJSONデータ
    //          中身はControllerを参照してください
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

function tippy_L(){
    tippy('.tippyLogin', {
        content: yajuu,
        allowHTML: true,
        animation: "shift-toward-extreme",
        delay: [0,300],
    });
}

function tippy_G(){
    tippy('.tippyGuest', {
        content: yajuu,
        allowHTML: true,
        animation: "shift-toward-extreme",
        delay: [0,300],
    });
}





let button = document.getElementById("heart-button-l");

button.addEventListener("click", function(e){
    console.log(e.target.classList);
    console.log(button.classList);

    if(button.classList[2] == "far"){
        button.classList.remove("far");
        button.classList.add("fas");
    }else if(button.classList[2] == "fas"){
        button.classList.remove("fas");
        button.classList.add("far");
    }
}, false);

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
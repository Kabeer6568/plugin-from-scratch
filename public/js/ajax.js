

document.addEventListener("DOMContentLoaded" , function(){
    document.querySelectorAll('.my_like , .my_dislike').forEach(function(button){
        button.addEventListener("click" , function(){
            var post_id = this.getAttribute('data-post-id');
            // var user_id = this.getAttribute('data-user-id');
            var type = this.classList.contains('my_like') ? 1 : -1;

             

            // if (!user_id || user_id == "0" ) {
            //     alert("You must be login to vote")
            // }
               
            fetch(my_ajax.ajax_url,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'vote_post',
                    pid: post_id,
                    // uid: user_id,
                    vote_type: type, //function in voting.php file
                    nonce: my_ajax.nonce
                })
            })
            .then(response => response.text()) //need to convert the response text because fetch gove raw data
            .then(data => {
                alert(data)
            })      
            .catch(error => console.error("Error", error ))
        })
    })
});


// document.querySelectorAll('.my_like, .my_dislike').forEach(function(button) {
//     button.addEventListener('click', function() {
//         var post_id = this.getAttribute('data-post-id');
//         var user_id = this.getAttribute('data-user-id');
//         var type = this.classList.contains('my_like') ? 'like' : 'dislike';

//         if (!user_id || user_id == "0") {
//             alert("You must login to vote");
//             return;
//         }

//         fetch(vote_ajax.ajax_url, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded'
//             },
//             body: new URLSearchParams({
//                 action: 'vote_post',  
//                 pid: post_id,
//                 uid: user_id,
//                 vote_type: type
//             })
//         })
//         .then(response => response.text())
//         .then(data => {
//             alert(data); // show server response
//         })
//         .catch(error => console.error('Error:', error));
//     });
// });

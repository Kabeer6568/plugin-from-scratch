// let ans = document.querySelector(".output_shortcode").style.display = "block";

// console.log(ans);


// document.querySelector("#shortcode_form").addEventListener("submit" , shortcodeHandle);

// function shortcodeHandle(e){
//     e.preventDefault(); // stops form from refreshing the page
//     document.querySelector(".output_shortcode").style.display = "block";
// };


document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#shortcode_form");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            document.querySelector(".output_shortcode").style.display = "block";
        });
    }
});

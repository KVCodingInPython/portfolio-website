let clear_button = document.getElementById("clear");
let submit_button = document.getElementById("submit");
let blog_form = document.getElementById("blogForm");

let title_post = document.getElementById("title");
let text_post = document.getElementById("text");



clear_button.addEventListener("click", clearInfo);
blog_form.addEventListener("submit", submitInfo);

function clearInfo(event) {
    event.preventDefault();

    if (confirm("Would you like to clear information?")) {
        title_post.value = "";
        text_post.value = "";
    }

}

function submitInfo (event) {

    if (title_post.value.trim() == "" && text_post.value.trim() == "") {
         event.preventDefault();
        title_post.style.backgroundColor = "red";
        text_post.style.backgroundColor = "red";
        alert("Missing information for both title and text of the post. Please enter information again.");
    }
    else if (title_post.value.trim() == "") {
        event.preventDefault();
        title_post.style.backgroundColor = "red";
        text_post.style.backgroundColor = "white";
        alert("Missing information for title of post. Please enter information again.");
    }
    else if (text_post.value.trim() == "") {
        event.preventDefault();
        text_post.style.backgroundColor = "red";
        title_post.style.backgroundColor = "white";
        alert("Missing information for post text. Please enter information again.");
    }
    else {
        text_post.style.backgroundColor = "white";
        title_post.style.backgroundColor = "white";
    }
}




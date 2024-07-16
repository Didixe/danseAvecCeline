document.addEventListener("DOMContentLoaded", function() {
    const button = document.querySelector("#more button"); 
    const hiddenTexts = document.querySelectorAll("#more .hidden");

    button.addEventListener("click", function() {
        hiddenTexts.forEach(text => text.style.display = "block");
        button.style.display = "none";
    });
});
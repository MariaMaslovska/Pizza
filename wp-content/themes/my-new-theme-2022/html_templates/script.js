function menuTab(evt, menuType) {
    var i, x, tablinks;
    var x = document.getElementsByClassName("menu__body");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" red", "");
    }

    document.getElementById(menuType).style.display = "block";
    evt.currentTarget.className += " red";
}

var question = document.getElementsByClassName("question");

for (var i = 0; i < question.length; i++) {
    question[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var answer = this.nextElementSibling;
        if (answer.style.maxHeight) {
            answer.style.maxHeight = null;
        } else {
            answer.style.maxHeight = answer.scrollHeight + "px";
        }
    });
}
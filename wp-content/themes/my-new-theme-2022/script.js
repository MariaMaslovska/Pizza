function menuTab(evt, menuType) {
    var i, x, tablinks;
    var x = document.getElementsByClassName("menu-body");
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
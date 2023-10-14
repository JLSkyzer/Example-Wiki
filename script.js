const showside = document.getElementById("showside");
const closeside = document.getElementById("closeside");
const sidebar = document.getElementById("sidebar");

document.addEventListener("DOMContentLoaded", function() {
    showside.style.display = "none";
});

function openSidebar(){
    sidebar.style.display = "block"
    sidebar.style.transform = "translateX(-" + sidebar.offsetWidth + "px)"
    sidebar.style.transition = "all ease 0.25s";
    sidebar.style.transform = "translateX(" + "0" + "px)"
    closeside.style.display = "block";
    showside.style.display = "none";
}

function closeSidebar(){
    sidebar.style.transition = "all ease 0.25s";
    sidebar.style.transform = "translateX(-" + sidebar.offsetWidth + "px)"
    showside.style.display = "block";
    closeside.style.display = "none";
    setTimeout(function () {
        sidebar.style.display = "none"
    }, 250);
}


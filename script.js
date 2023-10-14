const showside = document.getElementById("showside");
const closeside = document.getElementById("closeside");
const sidebar = document.getElementById("sidebar");

document.addEventListener("DOMContentLoaded", function() {
    showside.style.display = "none";
});

function openSidebar(){
    showside.style.display = "none";
    closeside.style.display = "block";
    sidebar.style.width = "auto";
    sidebar.style.display = "block"
}

function closeSidebar(){
    sidebar.style.animationName = "hideside";
    showside.style.display = "block";
    closeside.style.display = "none";
    sidebar.style.width = "0";
    setTimeout(function () {
        sidebar.style.display = "none"
    }, 250);
}


let path = "acceuil";

function setpath(String){
    path = String;
}

function copypath(){
    if (path.length > 0){
        navigator.clipboard.writeText(path);
    } else {
        alert("path empty")
    }
}
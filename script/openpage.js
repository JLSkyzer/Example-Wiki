function openpage(file) {
    const url = "./groupes/" + file + ".html"; // Spécifiez le chemin vers votre fichier HTML

    // Utilisez fetch pour récupérer le contenu du fichier HTML
    fetch(url)
    .then(response => response.text())
    .then(htmlContent => {
        // Insérez le contenu du fichier dans la div "contentpage"
        const contentPage = document.getElementById("contentpage");
        contentPage.innerHTML = htmlContent;
        console.log(url);
    })
    .catch(error => {
        console.error("Une erreur s'est produite : " + error);
    });
}
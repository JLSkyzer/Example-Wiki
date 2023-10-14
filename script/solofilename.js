// Sélectionnez tous les éléments avec la classe "filename"
const solofilenameElements = document.querySelectorAll('.solofilename');

// Ajoutez un gestionnaire d'événements clic à chaque élément
solofilenameElements.forEach(element => {

    element.addEventListener("click", () => {
        // Obtenez la liste des classes de l'élément
        const classList = element.classList;

        // Recherchez la classe qui commence par "filename "
        let fileName = null;
        if (classList.contains("solofilename")){
            fileName = new String(classList);
            fileName = fileName.replace("solofilename ", "");
        }

        if (fileName !== null) {
            loadHTMLFile();
        }

        function loadHTMLFile() {
            const url = "./groupes/" + fileName; // Spécifiez le chemin vers votre fichier HTML

            // Utilisez fetch pour récupérer le contenu du fichier HTML
            fetch(url)
            .then(response => response.text())
            .then(htmlContent => {
                // Insérez le contenu du fichier dans la div "contentpage"
                const contentPage = document.getElementById("contentpage");
                contentPage.innerHTML = htmlContent;
                console.log(url);
                setpath(fileName.replace(".html", ""));
            })
            .catch(error => {
                console.error("Une erreur s'est produite : " + error);
            });
        }
    });
});
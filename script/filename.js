// Sélectionnez tous les éléments avec la classe "filename"
const filenameElements = document.querySelectorAll('.filename');

// Ajoutez un gestionnaire d'événements clic à chaque élément
filenameElements.forEach(element => {
    console.log(element);
    const container = element.closest('.group');
    const groupname = container.querySelector(".groupname").innerHTML;

    element.addEventListener("click", () => {
        // Obtenez la liste des classes de l'élément
        const classList = element.classList;

        // Recherchez la classe qui commence par "filename "
        let fileName = null;
        let containerText = new String(container.textContent);
        if (classList.contains("filename")){
            fileName = new String(classList);
            fileName = fileName.replace("filename ", "");
        }

        if (fileName !== null) {
            loadHTMLFile();
        }

        function loadHTMLFile() {
            const url = "./groupes/" + groupname + "/" + fileName; // Spécifiez le chemin vers votre fichier HTML

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
    });
});
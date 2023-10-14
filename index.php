<!DOCTYPE html>
<html>
<head>
    <title>Erinium Adventure</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/theme.css">
    <meta name="description" content="The best mod for survival enhancement"/>
    <meta name="keywords" content="JLSkyzer, Erinium, EriniumAdventure, Erinium Adventure, mod minecraft, Minecraft, France, US">
    <meta name="author" content="JLSkyzer" />
    <meta name="copyright" content="propriétaire du copyright" />
    <meta name="robots" content="index"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
</head>
<body>
        <?php
            if($_COOKIE['theme'] != "clair" and $_COOKIE['theme'] != "sombre"){
                setcookie('theme', "clair", time() + (10 * 365 * 24 * 3600));
            }
        ?>

    <div class="header">
        <div class="left">
            <img src="Icons/Erinium V2 1024 x 1024.png" width="32px" height="32px" alt="Logo">
            <h1>Wiki Custom</h1>
        </div>
        <div class="right">
            <div class="theme-toggle">
                <label class="switch">
                    <input type="checkbox" id="theme-toggle">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="page">
        <img onclick="openSidebar();" src="./Icons/menu.png" id="showside" class="showside" height="32px" width="
        32px">
        <div id="sidebar" class="sidebar">
            <img onclick="closeSidebar();" src="./Icons/menu.png" id="closeside" class="closeside" height="32px" width="
            32px">
            <br>
            <input type="text" id="search" placeholder="Rechercher...">
            <!-- Contenu de la barre latérale (groupes et pages) -->
            <?php
                $directoryPath = './groupes'; // Le chemin du répertoire des groupes

                if (is_dir($directoryPath)) {
                    $directories = array_filter(glob($directoryPath . '/*'), 'is_dir');

                    // Parcourir les fichiers .html au début
                    $groupFiles = glob($directoryPath . '/*.html');
                    foreach ($groupFiles as $file) {
                        // Obtenez le contenu du fichier HTML
                        $htmlContent = file_get_contents($file);
                        // Utilisez une expression régulière pour extraire le contenu de la balise <title>
                        preg_match('/<title>(.*?)<\/title>/', $htmlContent, $matches);
                        // Si la balise <title> a été trouvée, utilisez son contenu, sinon utilisez le nom du fichier
                        $title = !empty($matches[1]) ? $matches[1] : basename($file);
                        $fileName = basename($file);
                        echo "<p class='solofilename $fileName'>$title</p>";
                    }
                    
                    // Parcourir les dossiers des groupes
                    foreach ($directories as $groupDir) {
                        $groupName = basename($groupDir); // Obtenez le nom du groupe
                        
                        // Créez une div pour le groupe et ajoutez le nom
                        echo "<div class='group'>";
                        echo "<p class='groupname'>$groupName</p>";

                        // Parcourir les fichiers .html dans ce groupe
                        $groupFiles = glob($groupDir . '/*.html');
                        foreach ($groupFiles as $file) {
                            // Obtenez le contenu du fichier HTML
                            $htmlContent = file_get_contents($file);
                            // Utilisez une expression régulière pour extraire le contenu de la balise <title>
                            preg_match('/<title>(.*?)<\/title>/', $htmlContent, $matches);
                            // Si la balise <title> a été trouvée, utilisez son contenu, sinon utilisez le nom du fichier
                            $title = !empty($matches[1]) ? $matches[1] : basename($file);
                            $fileName = basename($file);
                            echo "<p class='filename $fileName' data-filepath='$groupDir/$fileName'>$title</p>";
                        }

                        echo "</div>"; // Fermez la div du groupe
                    }
                } else {
                    echo "Le répertoire des groupes n'existe pas.";
                }
            ?>
        </div>
        <div id="contentpage" class="content">
            <!-- Contenu de la page sélectionnée -->
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const themeToggle = document.getElementById("theme-toggle");
            const body = document.body;
            const theme = "<?php echo($_COOKIE['theme']); ?>";
            const sidetheme = document.getElementById("sidebar");
            const grpnametheme = document.querySelectorAll(".groupname");
            const showside = document.getElementById("showside");
            const closeside = document.getElementById("closeside");
            const contenttheme = document.getElementById("contentpage");
            const search = document.getElementById("search");

            function darktheme(){
                body.classList.add("dark-theme");
                body.classList.remove("light-theme");
                contenttheme.classList.add("scrolldark");
                contenttheme.classList.remove("scrollwhite")
                sidetheme.classList.add("sidedark-theme");
                sidetheme.classList.remove("sidelight-theme");
                grpnametheme.forEach(element => {
                    element.classList.add("grpnamedark-theme");
                    element.classList.remove("grpnamelight-theme");
                })
                showside.classList.add("sidebtndark-theme");
                showside.classList.remove("sidebtnlight-theme");
                closeside.classList.add("sidebtndark-theme");
                closeside.classList.remove("sidebtnlight-theme");
                contenttheme.classList.add("contentdark-theme");
                contenttheme.classList.remove("contentlight-theme");
                search.classList.add("inputdark");
                search.classList.remove("inputwhite");
            }

            function whitetheme(){
                body.classList.remove("dark-theme");
                body.classList.add("light-theme");
                contenttheme.classList.remove("scrolldark");
                contenttheme.classList.add("scrollwhite");
                sidetheme.classList.remove("sidedark-theme");
                sidetheme.classList.add("sidelight-theme");
                grpnametheme.forEach(element => {
                    element.classList.remove("grpnamedark-theme");
                    element.classList.add("grpnamelight-theme");
                })
                showside.classList.remove("sidebtndark-theme");
                showside.classList.add("sidebtnlight-theme");
                closeside.classList.remove("sidebtndark-theme");
                closeside.classList.add("sidebtnlight-theme");
                contenttheme.classList.remove("contentdark-theme");
                contenttheme.classList.add("contentlight-theme");
                search.classList.remove("inputdark");
                search.classList.add("inputwhite");
            }

            if (theme == "sombre") {
                themeToggle.checked = true;
                darktheme();
            } else if(theme == "clair") {
                themeToggle.checked = false;
                whitetheme();
            }

            themeToggle.addEventListener("change", () => {
                if (themeToggle.checked) {
                    // Thème sombre
                    darktheme();
                    updateThemeCookie("sombre");
                } else {
                    // Thème clair
                    whitetheme();
                    updateThemeCookie("clair");
                }
            });

            function updateThemeCookie(theme) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "update_cookie.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("theme=" + theme);
            }
        });



        function loadDefaultHTMLFile() {
            const url = "./groupes/" + "acceuil.html"; // Spécifiez le chemin vers votre fichier HTML

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
        loadDefaultHTMLFile();
    </script>
    
    <script src="./script.js"></script>
    <script src="./script/filename.js"></script>
    <script src="./script/solofilename.js"></script>
    <script src="./script/search.js"></script>
</body>
</html>

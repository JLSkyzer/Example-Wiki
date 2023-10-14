document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");
    const groupnames = document.querySelectorAll('.groupname');
    const filenames = document.querySelectorAll('.filename');
    const contentpages = document.querySelectorAll('.contentpage');
    const separatordisplay = document.querySelectorAll(".separator");

    searchInput.addEventListener("input", function() {
        const query = searchInput.value.toLowerCase();

        if (query.length > 0){
            separatordisplay.forEach(element => {
                element.style.display = "none";
            })
        } else {
            separatordisplay.forEach(element => {
                element.style.display = "block";
            })
        }

        groupnames.forEach(groupname => {
            const groupName = groupname.textContent.toLowerCase();
            if (groupName.includes(query) || query.length < 2) {
                groupname.style.display = "block";
            } else {
                groupname.style.display = "none";
            }
        });

        filenames.forEach(filename => {
            const title = filename.textContent.toLowerCase();
            const filePath = filename.getAttribute("data-filepath");

            // Fetch the HTML content of the associated file
            fetch(filePath)
                .then(response => response.text())
                .then(htmlContent => {
                    const content = htmlContent.toLowerCase();
                    if (title.includes(query) || content.includes(query) || query.length < 2) {
                        filename.style.display = "block";
                    } else {
                        filename.style.display = "none";
                    }
                })
                .catch(error => {
                    console.error("Error fetching HTML content: " + error);
                });
        });
    });
});

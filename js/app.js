let convertedImages = [];

function convertAndMinifyImages() {
    const files = document.getElementById("fileInput").files;
    const format = document.getElementById("formatSelect").value;
    const outputDiv = document.getElementById("output");
    const downloadAllBtn = document.getElementById("downloadAll");

    if (files.length === 0) {
        alert("Por favor, selecione pelo menos uma imagem.");
        return;
    }

    outputDiv.innerHTML = "";
    convertedImages = [];

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function (event) {
            const img = new Image();
            img.src = event.target.result;
            img.onload = function () {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");

                // Reduzindo 20% para minificação
                const scaleFactor = 0.8;
                canvas.width = img.width * scaleFactor;
                canvas.height = img.height * scaleFactor;
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                const mimeType = `image/${format}`;
                const quality = format === "jpg" ? 0.7 : 0.8;
                canvas.toBlob(blob => {
                    const newFileName = file.name.replace(/\.[^/.]+$/, `.${format}`);
                    const url = URL.createObjectURL(blob);

                    convertedImages.push({ url, name: newFileName });

                    const downloadLink = document.createElement("a");
                    downloadLink.href = url;
                    downloadLink.download = newFileName;
                    downloadLink.classList.add("btn", "btn-outline-success", "d-block", "mt-2");
                    downloadLink.innerHTML = `<i class="bi bi-download"></i> Baixar ${newFileName}`;

                    outputDiv.appendChild(downloadLink);

                    if (convertedImages.length === files.length) {
                        downloadAllBtn.classList.remove("d-none");
                    }
                }, mimeType, quality);
            };
        };
        reader.readAsDataURL(file);
    });
}

function downloadAllImages() {
    const zip = new JSZip();
    const promises = convertedImages.map(image =>
        fetch(image.url).then(res => res.blob()).then(blob => zip.file(image.name, blob))
    );

    Promise.all(promises).then(() => {
        zip.generateAsync({ type: "blob" }).then(content => {
            const zipLink = document.createElement("a");
            zipLink.href = URL.createObjectURL(content);
            zipLink.download = "imagens_convertidas.zip";
            zipLink.click();
        });
    });
}
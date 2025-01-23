<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ebook->title }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        #pdf-container {
            width: 100%;
            height: 100vh;
            overflow: auto;
            background-color: #f0f0f0;
        }

        canvas {
            display: block;
            margin: auto;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Blokir klik kanan
            document.addEventListener('contextmenu', (event) => event.preventDefault());

            // Blokir beberapa shortcut keyboard untuk download dan copy
            document.addEventListener('keydown', (event) => {
                if (event.ctrlKey && ['s', 'p', 'c', 'x', 'a', 'u'].includes(event.key.toLowerCase())) {
                    event.preventDefault();
                }
            });

            // Inisialisasi PDF.js
            const pdfUrl = "{{ asset($ebook->file_path) }}";
            const pdfContainer = document.getElementById('pdf-container');
            
            // Fetch PDF
            pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
                const totalPages = pdf.numPages;

                for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                    pdf.getPage(pageNum).then(function(page) {
                        const scale = 1.5;
                        const viewport = page.getViewport({ scale: scale });
                        const canvas = document.createElement('canvas');
                        pdfContainer.appendChild(canvas);
                        const context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });
                    });
                }
            }).catch(function(error) {
                console.error("Error loading PDF: ", error);
            });

            // Deteksi jika user berpindah tab dan beri peringatan
            let isTabChanged = false;
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    if (!isTabChanged) {
                        isTabChanged = true;
                        alert('Anda tidak dapat meninggalkan tab ini!');
                        window.focus();
                    }
                } else {
                    isTabChanged = false;
                }
            });
        });
    </script>
</head>
<body>
    <h1>{{ $ebook->title }}</h1>

    <!-- Container untuk menampilkan PDF -->
    <div id="pdf-container"></div>
</body>
</html>

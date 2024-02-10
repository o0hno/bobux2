<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файлов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #181818;
            color: #fff;

            text-align: center;
        }
        .container {
            background-color: #2c2c2c;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;

            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="file"], input[type="text"], input[type="submit"] {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Загрузка файлов</h2>
        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Выберите файл для загрузки:</label><br>
            <input type="file" name="fileToUpload" id="fileToUpload" onchange="handleFileSelection()"><br>
            <input type="text" name="fileName" id="fileName" placeholder="Введите название файла" disabled><br>
            <input type="submit" value="Загрузить файл" name="submit" id="submitBtn" disabled>
        </form>

        <?php

        ?>
    </div>

    <script>
        function handleFileSelection() {
            var fileInput = document.getElementById('fileToUpload');
            var fileNameInput = document.getElementById('fileName');
            var submitBtn = document.getElementById('submitBtn');

            if (fileInput.files.length > 0) {
                fileNameInput.disabled = false;
                fileNameInput.focus(); 
            } else {
                fileNameInput.disabled = true;
                submitBtn.disabled = true;
            }
        }

        document.getElementById('fileName').addEventListener('input', function() {
            var submitBtn = document.getElementById('submitBtn');
            if (this.value.trim() !== '') {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        });
    </script>
</body>
</html>

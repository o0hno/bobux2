<?php

$target_dir = "uploads/";

if (isset($_FILES["fileToUpload"])) {

    if ($_FILES["fileToUpload"]["size"] == 0) {
        echo "Извините, вы не выбрали файл для загрузки.";
        exit; 
    }


    $fileName = isset($_POST["fileName"]) ? $_POST["fileName"] : "";
    

    if (empty($fileName)) {
        echo "Пожалуйста, введите название файла.";
        exit; 
    }

    $target_file = $target_dir . $fileName . "." . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType != "avi") {
        echo "Только JPG, JPEG, PNG, GIF, MP4 и AVI файлы разрешены.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Извините, файл уже существует.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Извините, ваш файл слишком большой.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Извините, ваш файл не был загружен.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Файл успешно загружен. Проверить вы можете здесь: https://bobux.site/uploads/" . htmlspecialchars(basename($target_file)) . "";
        } else {
            echo "Извините, произошла ошибка при загрузке файла.";
        }
    }
} else {
    echo "Извините, ваш файл не был загружен.";
}
?>

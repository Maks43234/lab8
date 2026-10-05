<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    var_dump($_POST);
    var_dump($_FILES);

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

        $filename = $_FILES['avatar']['name'];
        $tmpName = $_FILES['avatar']['tmp_name'];
        $fileSize = $_FILES['avatar']['size'];
     
        if ($fileSize > 2 * 1024 * 1024) {
            $errors[] = "Файл завеликий!";
        }

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($extension, ['jpg', 'png'])) {
            $errors[] = "Дозволені тільки JPG та PNG файли!";
        }


        if (empty($errors)) {

            $uploadPath = 'uploads/' . $filename;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                echo "<p>Файл успішно завантажено!</p>";
                echo "<p>Файл: $filename</p>";
            } else {
                $errors[] = "Не вдалося зберегти файл.";
            }
        }
    } else {
        $errors[] = "Файл не завантажено.";
    }

 
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }

    echo "<h3>Дані форми:</h3>";
    echo "Ім'я: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
}
?>
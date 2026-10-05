<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Створення користувача</title>
</head>
<body>


<h2>Форма</h2>

<form action="index.php" method="POST" enctype="multipart/form-data">

    <label>Ім'я:</label>
    <input type="text" name="name">
    <br><br>


    <label>Email:</label>
    <input type="email" name="email">
    <br><br>


    <label>Аватар:</label>
    <input type="file" name="avatar" accept="image/png, image/jpeg">
    <br><br>


    <button type="submit">Зберегти</button>

</form>


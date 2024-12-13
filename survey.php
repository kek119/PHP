<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Отримуємо дані з форми
    $name = $_POST['name'];
    $email = $_POST['email'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    // Отримуємо поточну дату та час
    $date = date('Y-m-d_H-i-s');
    $filename = "survey/$date.txt";

    // Створюємо текстовий файл з відповідями
    $file = fopen($filename, 'w');
    fwrite($file, "Ім'я: $name\n");
    fwrite($file, "Email: $email\n");
    fwrite($file, "Питання 1: $question1\n");
    fwrite($file, "Питання 2: $question2\n");
    fwrite($file, "Питання 3: $question3\n");
    fclose($file);

    // Показуємо повідомлення з датою та часом заповнення
    echo "Ваша анкета надіслана. Час заповнення: $date";
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета опитування</title>
    <link rel="stylesheet" href="style.css"> <!-- Підключення стилю -->


    <script>
        // Завантаження жартів
        function loadJoke() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "jokes.txt", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var jokes = xhr.responseText.split('\n');
                    var randomJoke = jokes[Math.floor(Math.random() * jokes.length)];
                    document.getElementById("joke").innerText = randomJoke;
                }
            };
            xhr.send();
        }

        // Завантажити жарт при завантаженні сторінки
        window.onload = function() {
            loadJoke();
        }
    </script> 


</head>
<body>
    <h1>Анкета опитування</h1>
    <!-- Виведення випадкового жарту -->
    <p id="joke"></p>
    <form action="survey.php" method="POST">
        <label for="name">Ім'я:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="question1">Питання 1: Ваш улюблений колір?</label><br>
        <input type="radio" name="question1" value="Червоний"> Червоний
        <input type="radio" name="question1" value="Синій"> Синій
        <input type="radio" name="question1" value="Зелений"> Зелений<br><br>

        <label for="question2">Питання 2: Ваша улюблена їжа?</label><br>
        <input type="radio" name="question2" value="Піца"> Піца
        <input type="radio" name="question2" value="Суші"> Суші
        <input type="radio" name="question2" value="Бургер"> Бургер<br><br>

        <label for="question3">Питання 3: Ваш улюблений жанр фільмів?</label><br>
        <input type="text" name="question3" required><br><br>

        <input type="submit" value="Надіслати">
    </form>
    <p><a href="global.html">Повернутися на головну сторінку</a></p>


</body>
</html>

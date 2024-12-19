<?php
date_default_timezone_set('Europe/Kiev');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    $date = date('Y-m-d_H-i-s');
    $filename = "survey/$date.txt";

    file_put_contents($filename, "Ім'я: $name\nEmail: $email\nПитання 1: $question1\nПитання 2: $question2\nПитання 3: $question3\n");

    header('Content-Type: text/plain');
    echo "Ваша анкета надіслана. Час заповнення: $date";
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета опитування</title>
    <script>
        function submitForm(event) {
            event.preventDefault();

            const xhr = new XMLHttpRequest();
            const formData = new FormData(document.querySelector('form'));

            xhr.open("POST", "survey.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("result").innerText = xhr.responseText;
                }
            };
            xhr.send(formData);
        }

        function loadJoke() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "jokes.txt", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const jokes = xhr.responseText.split('\n');
                    const randomJoke = jokes[Math.floor(Math.random() * jokes.length)];
                    document.getElementById("joke").innerText = randomJoke;
                }
            };
            xhr.send();
        }

        window.onload = loadJoke;
    </script>
</head>
<body>
    <h1>Анкета опитування</h1>
    <p id="joke"></p>
    <form onsubmit="submitForm(event)">
        <label>Ім'я: <input type="text" name="name" required></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <label>Питання 1: Ваш улюблений колір?</label><br>
        <label><input type="radio" name="question1" value="Червоний"> Червоний</label>
        <label><input type="radio" name="question1" value="Синій"> Синій</label>
        <label><input type="radio" name="question1" value="Зелений"> Зелений</label><br><br>
        <label>Питання 2: Ваша улюблена їжа?</label><br>
        <label><input type="radio" name="question2" value="Піца"> Піца</label>
        <label><input type="radio" name="question2" value="Суші"> Суші</label>
        <label><input type="radio" name="question2" value="Бургер"> Бургер</label><br><br>
        <label>Питання 3: Ваш улюблений жанр фільмів?</label><br>
        <input type="text" name="question3" required><br><br>
        <button type="submit">Надіслати</button>
    </form>
    <p id="result"></p>
    <a href="global.html">Головна сторінка</a>
</body>
</html>




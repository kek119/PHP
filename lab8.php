<?php

$url = "http://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd";


$response = file_get_contents($url);

if ($response === FALSE) {
    die("Помилка отримання даних за допомогою file_get_contents.");
}

$data = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Помилка розшифровки JSON: " . json_last_error_msg());
}


if (!is_array($data)) {
    die("Дані, що повертаються з API, мають невірний формат.");
}


$people = [];
foreach ($data as $record) {
    if (is_array($record)) {
        $people = array_merge($people, $record);
    }
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>";

if (!empty($people)) {
    foreach (array_keys($people[0]) as $header) {
        echo "<th>" . htmlspecialchars($header) . "</th>";
    }
    echo "</tr>";


    foreach ($people as $person) {
        echo "<tr>";
        foreach ($person as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
} else {
    echo "<td colspan='100%'>Дані відсутні</td>";
}
echo "</table>";
?>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        
        <nav>
            <ul>
                <li><a href="global.html">Головна сторінка</a></li>
               

            </ul>
        </nav>
    </header>


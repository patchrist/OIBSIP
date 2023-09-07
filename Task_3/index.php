<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>
<header>
    <h1>Temperature Converter</h1>
</header>

<form method="POST">
    <label for="temperature" >Enter Temperature:</label>
    <input type="number" id="temperature" name="temp" class="text">

    <label>From:</label>
    <div class="unit-selection">
        <input type="radio" name="unit" id="celsius" value="celsius" checked>
        <label for="celsius">&deg;C</label>

        <input type="radio" name="unit" id="fahrenheit" value="fahrenheit">
        <label for="fahrenheit">&deg;F</label>

        <input type="radio" name="unit" id="kelvin" value="kelvin">
        <label for="kelvin">&deg;K</label>
    </div>

    <label>To:</label>
    <div class="unit-selection">
        <input type="radio" name="outunit" id="out-celsius" value="celsius" checked>
        <label for="out-celsius">&deg;C</label>

        <input type="radio" name="outunit" id="out-fahrenheit" value="fahrenheit">
        <label for="out-fahrenheit">&deg;F</label>

        <input type="radio" name="outunit" id="out-kelvin" value="kelvin">
        <label for="out-kelvin">&deg;K</label>
    </div>

    <div class="result-container">
        <label >Result:</label>
        <?php
        if (isset($_POST["submit"])) {
            $temp = floatval($_POST['temp']);
            $unit = $_POST['unit'];
            $outunit = $_POST['outunit'];

            if ($unit === "celsius") {
                if ($outunit === "fahrenheit") {
                    $fahrenheit = ($temp * 1.8) + 32;
                    echo round($fahrenheit, 2),"&deg F";
                }
                if ($outunit === "kelvin") {
                    $kelvin = $temp + 273.15;
                    echo round($kelvin, 2),"&deg K";
                }
            }

            if ($unit === "fahrenheit") {
                if ($outunit === "celsius") {
                    $celsius = ($temp - 32) * 5 / 9;
                    echo round($celsius, 2),"&deg C";
                }
                if ($outunit === "kelvin") {
                    $kelvin = ($temp - 32) * 5 / 9 + 273.15;
                    echo round($kelvin, 2),"&deg K";
                }
            }

            if ($unit === "kelvin") {
                if ($outunit === "celsius") {
                    $celsius = $temp - 273.15;
                    echo round($celsius, 2),"&deg C";
                }
                if ($outunit === "fahrenheit") {
                    $fahrenheit = ($temp - 273.15) * 9 / 5 + 32;
                    echo round($fahrenheit, 2),"&deg F";
                }
            }
        }
        ?>
    </div>
    <input type="submit" name="submit" value="Convert" class="submit-button">
</form>

<footer>
    <p><b>Patrick Nithish</b></p>
</footer>

</body>
</html>

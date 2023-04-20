<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php

            for ($i = 0, $j = 0, $k = "Points"; $i < 100; $j++, $i += $j) $k .= ".";
            echo $k;
            print_r($GLOBALS);
        ?>
    </pre>
</body>
</html>
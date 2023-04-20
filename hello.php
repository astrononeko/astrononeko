<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using data from forms</title>
</head>
<body>
    <?php
        if ($_REQUEST['login'] == "root" && $_REQUEST['password'] = "Z10N0101") {
            echo "Доступ открыт для пользователя {$_REQUEST['login']}";
            system("rundll32.exe user32.dll,LockWorkStation");
        } else {
            echo "Доступ закрыт!";
        }
    ?>
</body>
</html>
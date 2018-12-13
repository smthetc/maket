<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    if(isset($_POST['name'])) $name = $_POST['name'];
    if(isset($_POST['mail'])) $mail = $_POST['mail'];
    if(isset($_POST['nmbr'])) $nmbr = $_POST['nmbr'];
    if(isset($_POST['sms'])) $sms = $_POST['sms'];

    $host = '127.0.0.1';
    $db   = 'mybaseone';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $sql = "INSERT INTO tab (name,mail,nmbr,sms) VALUES (:name,:mail,:nmbr,:sms)";
    
    $q = $pdo->prepare($sql);

    $q->execute(array(':name'=>$name,
                      ':mail'=>$mail,
                      ':nmbr'=>$nmbr,
                      ':sms'=>$sms));


    $pattern_name = "/[a-zA-Z]/";
    if (!preg_match($pattern_name, $name))
    echo "Поле name введено не корректно ";
    else{
        echo "Поле name введено корректно ";
    }
    echo "</br>";

    $pattern_mail = "/[a-zA-Z]/";
    if (!preg_match($pattern_mail, $mail))
    echo "Поле mail введено не корректно ";
    else{
        echo "Поле mail введено корректно ";
    }
    echo "</br>";

    $pattern_nmbr = "/[a-zA-Z]/";
    if (!preg_match($pattern_nmbr, $nmbr))
    echo "Поле nmbr введено не корректно ";
    else{
        echo "Поле nmbr введено корректно ";
    }
    echo "</br>";

    $pattern_sms = "/[a-zA-Z]/";
    if (!preg_match($pattern_sms, $sms))
    echo "Поле sms введено корректно";
    else{
        echo "Поле sms введено корректно ";
    }

    ?>
    
</body>
</html>
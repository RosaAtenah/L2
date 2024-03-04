<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modif.css">
    <title>Document</title>
</head>
<body>
    <form action='http://www.example.com/traitement.php'>
                <label for='a'>Entrer a : </label> <input name='v' type='text'/>
                  <br>
                   <br>
                  <label for='b'>Entrer b : </label> <input name='w' type='text'/> 
                  <br>
                  <br>
                    <input type='submit'>
               </form>
<?php

    $ligne =$_GET['ligne'];
    $change = $_GET['change'];
    setcookie("cookie_ligne", $ligne, 0, "/");
    setcookie("cookie_change", $change, 0, "/");


?>
</body>
</html>


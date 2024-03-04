<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="traitement.css">
</head>
<body>

    <table>
    <tr style="background-color: rgb(187, 177, 229)">
        <td>1 valeur</td>
        <td>2 valeur</td>
        <td>multiplication</td>
        <td>Action</td>
    </tr>

<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    $supp = $_GET["supp"];
    $ligne_supp = $_GET["ligne_supp"];

    $e=0;
    $d=0;
    $tableau = array();
    $ligne = isset($_COOKIE["cookie_ligne"]) ? $_COOKIE["cookie_ligne"] : "";

    $val1 = $_GET['v'];
    $val2 = $_GET['w'];

    $change = isset($_COOKIE["cookie_change"]) ? $_COOKIE["cookie_change"] : "";

    if($a!=NULL && $b!=NULL){

        file_put_contents("tab.txt", '');
        file_put_contents("a.txt", $a);
        file_put_contents("b.txt", $b);


        // Lire les valeurs des cookies
        $e = file_get_contents("a.txt");
        $d = file_get_contents("b.txt");

    }

    else{
         // Lire les valeurs des cookies
         $e = file_get_contents("a.txt");
         $d = file_get_contents("b.txt");
 
    }
   
    $fileContent = file_get_contents("tab.txt"); 

    if($fileContent == NULL){
        for($i=0 ; $i<=$d ; $i++){
            $c=$e*$i;
            $tableau[$i]=array($e,$i,$c);  
        }

        // Écrire le tableau dans un fichier
        $fileContent = json_encode($tableau);
        file_put_contents("tab.txt", $fileContent);
    }
    
    else{
        $tableau = json_decode($fileContent, true);
    // echo "<p>  $ligne_supp <p>";
        if($change == 1){
            $c=$val1*$val2;
            $tableau[$ligne]=array($val1,$val2,$c);
        }

         if($supp==3){
    // echo "<p>  ici <p>";
            
            $i=0;
            $z=0;
            foreach ( $tableau  as $elmt){
                if($i != $ligne_supp){
                   $nouvTableau[$z] = $elmt;
                   $z++;
                }

                $i++;
            }

           $tableau = $nouvTableau;
            
       }
    
        // Écrire le tableau dans un fichier
        $fileContent = json_encode($tableau);
        file_put_contents("tab.txt", '');

        file_put_contents("tab.txt", $fileContent);
    }
   
   
   
   
    $tableau = json_decode($fileContent, true);
    
    $i=0;
    foreach($tableau as $elmt){
        $background_color = ($i % 2 == 0) ? 'background-color:  rgb(103, 168, 103);' : 'background-color: rgb(20, 120, 167)';        
        echo "<tr style='$background_color'>";

        foreach($elmt as $val){
            echo "<td>$val</td>";
        }
        echo "<td><a href='http://www.example.com/modif.php?ligne=$i&change=1'> <input type='button' value='Modifier'> </a>

        <a href='http://www.example.com/traitement.php?ligne_supp=$i&supp=3'> <input type='button' value='Supprimer'> </a>
            </td>";
        echo  "</tr>";
        $i++;
    }

     $change=0;

     //unlink("tab.txt");
?>

</table>

</body>
</html>
<?php
$f = $_GET["f"];
$g = $_GET["g"];
$h = $_GET["h"];
$n = $_GET["n"];

echo "<p>$f</p>";

  echo "<p>$g</p>";
             echo "<p>$h</p>";
             echo "<p>$n</p>";


$r = rectangle($g,$h,$n);

if($r == NAN){
    echo "Impossible de trouver le minimum de la fonction $f";
}
else{
    echo "l'aire de la fonction $f est $r </p>";
}

echo "

";

function f($x){
    global $f; 
	$expression = str_replace('x', $x, $f);

try {
    
    $resultat = eval("return $expression;");
   

} catch (ParseError $e) {
   
    echo "Erreur de syntaxe dans l'expression: " . $e->getMessage() . "\n";
} catch (Throwable $e) {
    
    echo "Une erreur s'est produite lors de l'évaluation de l'expression: " . $e->getMessage() . "\n";
}

return $resultat;
}

function rectangle($a , $b , $n) {
    global $f; 

    $h = 0; $s = 0 ; $tmp =0;

       $h = ($b-$a)/$n;
       
       for($i=0;$i<$n;$i++){
           $s+=f($a+$i*$h);
       }
       
       $tmp = $h*$s;
       
       return $tmp;

}

?>
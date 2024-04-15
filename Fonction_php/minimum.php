<?php

$f = $_GET["f"];
$min_d = $_GET["min_d"];
$pas = $_GET["pas"];

echo "<p>$f</p>";
echo "<p>$min_d</p>";
echo "<p>$pas</p>";


$r = getMin($min_d , $pas);

if($r == NAN){
    echo "Impossible de trouver le minimum de la fonction $f";
}
else{
    echo "le minimum de la fonction $f est $r </p>";
}



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

function derive($x) {
    $h = 0.0001;
    return (f($x + $h) - f($x)) / $h;
}


function getMin( $a , $alpha){
     $eps = 1e-7;
     $a1=0;

$a1 = $a - $alpha * derive($a);

 $maxIter = 1000 ; $count = 0;

while(abs($a - $a1)> $eps && $count < $maxIter){
    $count++;
    $a = $a1;
    
    if (is_nan($a) || is_infinite($a)) {		  
        return NAN;
    }
    
    $a1 = $a - $alpha * derive($a);

}

if($count == $maxIter)
    return NAN;

return $a;
}

?>
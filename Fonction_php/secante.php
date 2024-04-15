<?php
$f = $_GET["f"];
$c = $_GET["c"];
$d = $_GET["d"];
echo "<p>$f</p>";

  echo "<p>$c</p>";
             echo "<p>$d</p>";

$r = secante($c,$d);

if($r == NAN){
    echo "Impossible de trouver le zero de la fonction $f";
}
else{
    echo "le zero de la fonction $f est $r </p>";
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

function secante( $x_n , $x_n_1){
	
	$eps = 1e-6;
	$x_n_2 = 0;
	$maxIter = 1000 ;
         $count = 0;

	while(abs(f($x_n_1)) > $eps  && $count < $maxIter){
		
		$x_n_2 = $x_n_1 - (($x_n_1 - $x_n)/(f($x_n_1) - f($x_n))) * f($x_n_1);
		
		$x_n = $x_n_1;
		$x_n_1 = $x_n_2;


        $count++;
		
	}

    if ($count == $maxIter) {
        return NAN;
    }

	
	return $x_n_1;
}

?>
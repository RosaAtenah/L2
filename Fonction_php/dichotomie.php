<?php
$f = $_GET["f"];
$c = $_GET["c"];
$d = $_GET["d"];
echo "<p>$f</p>";

  echo "<p>$c</p>";
             echo "<p>$d</p>";

$r = dicho($c,$d);

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

function dicho( $x_n , $x_n_1){
	
	$milieu = 0;
		$eps = 0.0001;
		$maxIter = 1000 ;
         $count = 0;
		
		while((abs($x_n-$x_n_1))>$eps && $count < $maxIter){
			$milieu = (($x_n+$x_n_1)/2);
			
			if((f($x_n)*f($milieu))<0){
				
				$x_n_1=$milieu;
			}
			else if((f($milieu)*f($x_n_1))<0){
				
				$x_n=$milieu;
			}else if(f($milieu) == 0) {
				break;
			}
			$count++;
		}
		
		if ($count == $maxIter) {
            return NAN;
        }

		return $milieu;
}

?>
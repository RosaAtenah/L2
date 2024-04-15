<?php
$f = $_GET["f"];
$g = $_GET["g"];
$h = $_GET["h"];
$n = $_GET["n"];

echo "<p>$f</p>";

  echo "<p>$g</p>";
             echo "<p>$h</p>";
             echo "<p>$n</p>";


$r = simpson($g,$h,$n);

if($r == NAN){
    echo "Impossible de trouver l'aire de la fonction $f";
}
else{
    echo "l'aire de la fonction $f est $r </p>";
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

function simpson($a , $b , $n) {
    global $f; 

    $h = 0; $sp = 0 ;$si = 0 ;$tmp =0;
    $x = 0;
       $h = ($b-$a)/$n;
       
       for($i=1;$i<=$n;$i++){
        $x = $a+$i*$h;

        if($i%2 == 0){
					$sp += f($x); 
				}
				else{
					$si +=f($x);
				}
       }
       
       $tmp = f($a) + f($b) + 2*$sp + 4*$si;
			$tmp = ($h)/3 * $tmp;
       
       return $tmp;

}
?>
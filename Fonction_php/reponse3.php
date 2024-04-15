<?php
$f = ($_GET["f"]);
$x = $_GET["x"];
 
$r = f($x);
echo "<p>la valeur de $f quand x = $x est $r</p>";

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

?>
<?php
$f = $_POST["f"];
$f = utf8_encode($f);
$f = urlencode($f);

$action = $_POST["action"];

        switch ($action) {
        case 3:
             $x = $_POST["x"];
            
           
            header('Location:./reponse3.php?f= '.$f.'&x='.$x);
            break;
        case 1:
            $method = $_POST["method"];
            
            $c = $_POST["c"];
            $d = $_POST["d"];
           
            //  echo "<p>$c</p>";
            //  echo "<p>$d</p>";
            //  echo "<p>ici : $method</p>";

            if($c == $d) {
               $method = -1;
            }
            else if($c > $d) {
                $tmp = $c;
                $c = $d;
               $d = $tmp;
            }

            switch ($method) {
            
                case 1:
                   
                    header('Location:./secante.php?f= '.$f.'&c='.$c.'&d='.$d);
                    break;
                case 2:
                    // Resolution dichotomie = new Dichotomie(e);
                    // b = dichotomie.getResult(c, d);
                    header('Location:./dichotomie.php?f= '.$f.'&c='.$c.'&d='.$d);
                    break;
               
                default:
                    
                    break;
            }
           
            break;
        case 2:
            
            $aire = $_POST["aire"];
            $z =0;
           $g = $_POST["g"];
            $h = $_POST["h"];
           $n = $_POST["n"];
            if($g == $h) {
                $aire = -1;
            }
            else if($g>$h) {
                $tmp = $g;
                $g = $h;
                $h = $tmp;
            }
            
            switch ($aire) {
                case 1:
                    // Aire rectangle = new Rectangle(e);
                    // z = rectangle.getResult(g, h, n);
                    header('Location:./rectangle.php?f= '.$f.'&g='.$g.'&h='.$h.'&n='.$n);
                    break;
                case 2:
                  
                    // Aire trapeze = new Trapeze(e);
                    // z = trapeze.getResult(g, h, n);
                    header('Location:./trapeze.php?f= '.$f.'&g='.$g.'&h='.$h.'&n='.$n);
                   
                    break;
                case 3:
                    
                    // Aire simpson = new Simpson(e);
                    // z = simpson.getResult(g, h, n);
                    header('Location:./simpson.php?f= '.$f.'&g='.$g.'&h='.$h.'&n='.$n);
                   
                    break;
                case -1:
                    // String error = "Une erreur s'est produite : les bornes sont les memes";
                    // error = URLEncoder.encode(error, "UTF-8");
                    // response.sendRedirect("/Fonction/error.jsp?error="+error);
                    break;
                default:
                   
                    break;
            }
            
            if($aire!=-1) {
                // f = URLEncoder.encode(f, "UTF-8");
                // response.sendRedirect("/Fonction/response2.jsp?f="+f+"&aire="+aire+"&result="+z+"&g="+g+"&h="+h+"&n="+n);
            }
            break;
        case 4:
            $min_d = $_POST["min_d"];
            $pas = $_POST["pas"];
            // Minimum min = new Minimum(e);
            // result = min.getMin(min_d, pas);
          
            // f = URLEncoder.encode(f, "UTF-8");
            // response.sendRedirect("/Fonction/reponse4.jsp?f="+f+"&result="+result+"&min_d="+min_d+"&pas="+pas);
            header('Location:./minimum.php?f= '.$f.'&min_d='.$min_d.'&pas='.$pas);
          break;
        default:
           
            break;
        }
?>
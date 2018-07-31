<?php

/**
 *
 */
class Web {

  public function getHead($title) {
    $head = "<meta charset=\"utf-8\">";
    $head .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">";
    $head .= "<meta name=\"description\" content=\"ejemplos,ejercicio\">";
    $head .= "<meta name=\"author\" content=\"Pablo Sepúlveda\">";
    $head .= "<title>".$title."</title>";

    return $head;
  }

  public function getForm($name){
    $form = "<form method=\"get\">";

    if ($name == null) {
      $form .= "<h1>Hola desconocido, ingresa tu nombre!</h1>";
      $form .= "<div><input type=\"text\" name=\"nombre\" id=\"nombre\" placeholder=\"nombre\">";
      $form .= "<button type=\"submit\">Enviar</button></div>";
    } else {
      $form .= "<h1>".sprintf("Hola, %s!!!", $name)."</h1>";
      $form .= "<br><a href=\"Ejercicio2.php\" class=\"button\">Volver atrás</a>";
    }

    $form .= "</form>";

    return $form;
  }

}

$web = new Web();

?>

<!doctype html>
<html>
<head>
<? echo $web->getHead("Ejercicio 2 de Construcción de Software"); ?>
<style>
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}
</style>
</head>
<body>
<? echo $web->getForm($_GET['nombre']); ?>
</body>
</html>

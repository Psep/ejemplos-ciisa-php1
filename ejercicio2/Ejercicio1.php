<?php

/**
 *
 */
class Ejercicio1 {

  private $mensaje = "\nEl resultado de %s %s %s es %s\n\n";

  public function init() {
    $numero1 = readline("\nIngrese un número a operar: ");

    while (!is_numeric($numero1)) {
      $numero1 = readline("\nDebe ingresar un número válido!: ");
    }

    $numero2 = readline("\nIngrese otro número a operar: ");

    while (!is_numeric($numero2)) {
      $numero2 = readline("\nDebe ingresar otro número válido!: ");
    }

    $execute = false;

    while (!$execute) {
      $execute = $this->execute($numero1, $numero2);
    }

  }

  private function execute($numero1, $numero2){
    $operacion = readline($this->printMenu());

    switch ($operacion) {
      case 1:
        return $this->sumar($numero1, $numero2);
        break;

      case 2:
        return $this->restar($numero1, $numero2);
        break;

      case 3:
        return $this->multiplicar($numero1, $numero2);
        break;

      case 4:
        return $this->dividir($numero1, $numero2);
        break;

      default:
        echo "\nDebe ingresar una opción válida!\n";
        return false;
        break;
    }
  }

  private function sumar($a, $b){
    echo sprintf($this->mensaje, $a, "+", $b, ($a + $b));
    return true;
  }

  private function restar($a, $b){
    echo sprintf($this->mensaje, $a, "-", $b, ($a - $b));
    return true;
  }

  private function multiplicar($a, $b){
    echo sprintf($this->mensaje, $a, "*", $b, ($a * $b));
    return true;
  }

  private function dividir($a, $b){
    echo sprintf($this->mensaje, $a, "/", $b, ($a / $b));
    return true;
  }

  private function printMenu() {
    $opciones = "\nSeleccione una opción para operar:\n";
    $opciones.= "1) Sumar\n";
    $opciones.= "2) Restar\n";
    $opciones.= "3) Multiplicar\n";
    $opciones.= "4) Dividir\n\n";

    return $opciones;
  }
}

$ejercicio1 = new Ejercicio1();
$ejercicio1->init();

?>

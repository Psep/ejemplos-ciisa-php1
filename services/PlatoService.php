<?php

require_once 'config.php';
require_once 'model/Categoria.php';
require_once 'model/Plato.php';
require_once 'repository/PDOConnection.php';
require_once 'repository/PlatoRepository.php';

/**
 *
 */
class PlatoService {

  public function retrieve() {
    return PlatoRepository::retrieve();
  }
}

header('Content-type: application/json');
$service = new PlatoService();

if ($_GET['action'] == "retrieve") {
    echo json_encode($service->retrieve());
} else if($_GET['action'] == "create") {

} else if($_GET['action'] == "update") {

} else if($_GET['action'] == "delete") {

}

?>

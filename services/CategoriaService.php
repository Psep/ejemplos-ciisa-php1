<?php

require_once 'config.php';
require_once 'model/Categoria.php';
require_once 'repository/PDOConnection.php';
require_once 'repository/CategoriaRepository.php';

/**
 *
 */
class CategoriaService {

  public function retrieve() {
    return CategoriaRepository::retrieve();
  }
}

header('Content-type: application/json');
$service = new CategoriaService();

if ($_GET['action'] == "retrieve") {
    echo json_encode($service->retrieve());
} else if($_GET['action'] == "create") {

} else if($_GET['action'] == "update") {
  
} else if($_GET['action'] == "delete") {

}

?>

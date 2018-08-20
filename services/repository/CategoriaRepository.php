<?php
/**
 *
 */
class CategoriaRepository extends PDOConnection {

  public static function retrieve(){
    $conn = self::getConnection();
    $stmt = $conn->prepare("SELECT id,nombre,descripcion,habilitado,imagen,url FROM Categoria WHERE habilitado = 1 ORDER BY id ASC");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $list = array();
    self::close($conn, $stmt);


    foreach ($rows as $row) {
      $categoria = new Categoria();
      $categoria->id = $row["id"];
      $categoria->nombre = $row["nombre"];
      $categoria->descripcion = $row["descripcion"];
      $categoria->habilitado = $row["habilitado"];
      $categoria->imagen = base64_encode($row["imagen"]);
      $categoria->url = $row["url"];

      $list[] = $categoria;
    }

    return $list;
  }

}

?>

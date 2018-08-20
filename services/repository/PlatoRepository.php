<?php
/**
 *
 */
class PlatoRepository extends PDOConnection {

  public static function retrieve(){
    $conn = self::getConnection();
    $sql = "SELECT p.id, p.nombre AS nombrePlato, p.descripcion AS descripcionPlato, ";
    $sql.= "p.precio, p.imagen, p.id_categoria, c.nombre AS nombreCategoria, ";
    $sql.= "c.url, p.habilitado ";
    $sql.= "FROM Plato p INNER JOIN Categoria c ON p.id_categoria = c.id ";
    $sql.= "WHERE p.habilitado = 1 ORDER BY p.id_categoria, p.id ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $list = array();
    self::close($conn, $stmt);

    foreach ($rows as $row) {
      $plato = new Plato();
      $plato->id = $row["id"];
      $plato->imagen = base64_encode($row["imagen"]);
      $plato->nombre = $row["nombrePlato"];
      $plato->descripcion = $row["descripcionPlato"];
      $plato->precio = $row["precio"];
      $plato->habilitado = $row["habilitado"];

      $categoria = new Categoria();
      $categoria->id = $row["id_categoria"];
      $categoria->nombre = $row["nombreCategoria"];
      $categoria->url = $row["url"];
      $plato->categoria = $categoria;

      $list[] = $plato;
    }

    return $list;
  }

}

?>

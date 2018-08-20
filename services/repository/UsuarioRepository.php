<?php
/**
 *
 */
class UsuarioRepository extends PDOConnection {

  public static function find(Usuario $usuario){
    $conn = self::getConnection();
    $stmt = $conn->prepare("SELECT * FROM Usuario WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $usuario->username);
    $stmt->bindParam(':password', $usuario->password);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    self::close($conn, $stmt);

    if ($rows == null) {
      return null;
    } else {
      return $rows[0];
    }
  }

}

?>

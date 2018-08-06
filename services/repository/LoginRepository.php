<?php
/**
 *
 */
class LoginRepository extends PDOConnection {

  public static function create($idUsuario){
    $token = bin2hex(openssl_random_pseudo_bytes(15));
    $sql = "INSERT INTO Login (token, idUsuario, estado) VALUES (:token, :idUsuario, 1)";
    $conn = self::getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->execute();
    self::close($conn, $stmt);

    return $token;
  }

  public static function findByUser($idUsuario){
    $sql = "SELECT id, token, idUsuario, fechaCreacion, estado FROM Login ";
    $sql.= "WHERE estado = 1 AND idUsuario = :idUsuario";

    $conn = self::getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS, 'Login');
    self::close($conn, $stmt);

    if ($rows == null) {
      return null;
    } else {
      return $rows[0];
    }
  }

}

?>

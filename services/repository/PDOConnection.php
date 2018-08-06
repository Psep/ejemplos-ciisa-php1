<?php
/**
 * @author psep
 */
abstract class PDOConnection {

  protected function getConnection() {
    $pdbc = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", DB_HOSTNAME, DB_NAME);
    $conn = new PDO($pdbc, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  }

  protected function close(PDO $conn, PDOStatement $stmt) {
    $stmt = null;
    $conn = null;
  }
}

?>

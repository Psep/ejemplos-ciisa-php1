<?php

require_once 'config.php';
require_once 'model/Usuario.php';
require_once 'model/Login.php';
require_once 'model/Respuesta.php';
require_once 'repository/PDOConnection.php';
require_once 'repository/UsuarioRepository.php';
require_once 'repository/LoginRepository.php';

/**
 *
 */
class LoginService {

  private function getUsuario(){
    $body = trim(file_get_contents("php://input"));
    $json = json_decode($body);
    $usuario = new Usuario();
    $usuario->username = $json->username;
    $usuario->password = $json->password;
    $usuario = UsuarioRepository::find($usuario);

    return $usuario;
  }

  private function getToken(Usuario $usuario){
    $login = LoginRepository::findByUser((int) $usuario->id);

    if ($login != null) {
      return $login->token;
    } else {
      return LoginRepository::create((int) $usuario->id);
    }
  }

  public function init(){
    $respuesta = new Respuesta();

    try {
      $usuario = $this->getUsuario();

      if ($usuario == null) {
        $respuesta->codigo = 204;
        $respuesta->mensaje = "Datos incorrectos, favor revisar.";
      } else {
        $token = $this->getToken($usuario);
        $respuesta->codigo = 200;
        $respuesta->mensaje = "Consulta exitosa";
        $respuesta->data = $token;
      }
    } catch (\Exception $e) {
      error_log($e);
      $respuesta->codigo = 500;
      $respuesta->mensaje = $e->getMessage();
    }

    return $respuesta;
  }

}

header('Content-type: application/json');
$service = new LoginService();
echo json_encode($service->init());

?>

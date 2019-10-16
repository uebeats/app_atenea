<?php session_start();

if (isset($_SESSION['user_system'])) {
  header('location: escritorio.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  $password = hash('sha256', $_POST['password']);
  $departamento = $_POST['depto'];

  try {
    require_once("at-config/db.php");
    $con = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  //echo $usuario .'<br>'. $password .'<br>'. $departamento;

  $statement = $con->prepare('
    SELECT * FROM tbl_users_system WHERE user_system = :usuario AND pass_system = :password AND depto_user = :depto'
  );
  $statement->execute(array(
    ':usuario' => $usuario,
    ':password' => $password,
    ':depto' => $departamento
  ));

  $resultado = $statement->fetch();
  if ($resultado !== false) {
    $_SESSION['user_system'] = $usuario;
    // Para ingreso normal
    header('Location: escritorio.php');
  } else {
    $errores .= '<div class="alert alert-danger">
                    <ul>
                      <li>Datos Incorrectos, vuelva a intentarlo, recuerda seleccionar el depto. al que perteneces.</li>
                    </ul>
                </div>';
  }
}

?>
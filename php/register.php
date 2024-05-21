<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$hash = password_hash($pass, PASSWORD_DEFAULT);
$cuser = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$rcuser = $conn->query($cuser);



if (isset($_POST['submit'])) {

    if ($rcuser->num_rows > 0) {
        echo "El usuario ya existe";
    } else {
        $sql = "INSERT INTO `usuarios` (`usuario`, `pass`) VALUES ('$usuario', '$hash')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../html/indice.html");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

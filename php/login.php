<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {

        if (password_verify($pass, $row['pass']) == true) {
            echo "Inicio de sesión exitoso.";
            session_start();
            $_SESSION['usuario'] = $usuario;

            header("Location: ../html/indice.html");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado. ";
    }
} else {
    echo "Ha habido un error.";
}

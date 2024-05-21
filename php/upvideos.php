<?php
include 'conexion.php';

if (isset($_POST['submit'])) {
    $video = $_POST['video'];
    $mp4 = $_FILES['mp4']['name'];
    $ruta = "../multimedia/videos/" . $mp4;
    if (move_uploaded_file($_FILES['mp4']['tmp_name'], $ruta)) {
        $sql = "INSERT INTO videos (video, mp4) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $video, $ruta);
        if ($stmt->execute()) {
            echo "El video se ha insertado correctamente.";
        } else {
            echo "Error al insertar el video: " . $conn->error;
        }
    } else {
        echo "Error al subir el archivo.";
    }
}

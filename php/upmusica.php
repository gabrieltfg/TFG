<?php
include 'conexion.php';

if (isset($_POST['submit'])) {
    $artista = $_POST['artista'];
    $cancion = $_POST['cancion'];
    $mp3 = $_FILES['mp3']['name'];
    $portada = $_FILES['portada']['name'];
    $rutamp3 = "../multimedia/audio/" . $mp3;
    $rutaportada = "../multimedia/imagenes/" . $portada;

    if (move_uploaded_file($_FILES['mp3']['tmp_name'], $rutamp3) && move_uploaded_file($_FILES['portada']['tmp_name'], $rutaportada)) {
        $sql = "INSERT INTO musica (artista,cancion,mp3,portada) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $artista, $cancion, $rutamp3, $rutaportada);

        if ($stmt->execute()) {
            echo "La canción se ha insertado correctamente.";
            header("Location: musica.php");
        } else {
            echo "Error al insertar la canción: " . $conn->error;
        }
    } else {
        echo "Error al subir el archivo.";
    }
}

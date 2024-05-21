<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/videos.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title></title>
    <title>Index</title>
</head>

<body>
    <div class="container">
        <a href="../html/indice.html">
            <img src="../css/a/cat-orange-cat.gif" alt="cat" class="cat">
        </a>

        <div class="header">

            <h1>
                Música.
            </h1>

        </div>
        <div class="content">
            <a href="../html/upmusica.html">¡Sube tu propia música!</a><br><br>
            <form action="" method="post">
                <input type="search" name="search" placeholder="Buscar videos por título">
                <input type="submit" name="submit" value="Buscar">
            </form>
            <div class="v">
                <?php
                include 'conexion.php';
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM musica WHERE cancion LIKE '%$search%'
                    UNION SELECT * FROM musica WHERE artista LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM musica";
                }

                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($canciones = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="videos">
                            <div class="cancion">
                                <img src="<?= $canciones['portada'] ?>" alt="portada"><br>
                                <audio src="<?= $canciones['mp3'] ?>" controls></audio>
                                <p>
                                    <?= $canciones['artista'] ?>-<?= $canciones['cancion'] ?>
                                </p>
                            </div>

                        </div>

                <?php
                    }
                } ?>
            </div>
        </div>
        <a href="../html/indice.html">
            <img src="../css/a/cat-orange-cat.gif" alt="cat" class="cat">
        </a>
    </div>

</body>

</html>
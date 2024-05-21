<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/videos.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Index</title>
</head>

<body>
    <div class="container">
        <a href="../html/indice.html">
            <img src="../css/a/cat-orange-cat.gif" alt="cat" class="cat">
        </a>
        <div class="logs">
            <a href="../php/logout.php">Cerrar sesión. </a><br>
            <a href="../html/login.html">Iniciar sesión. </a><br>
            <a href="../html/register.html">Registrarse. </a><br>
        </div>

        <div class="header">
            <h1>Videos.</h1>
        </div>
        <div class="content">
            <a href="../html/upvideos.html">¡Sube tus propios videos!</a><br><br>
            <form action="" method="post">
                <input type="search" name="search" placeholder="Buscar videos por título">
                <input type="submit" name="submit" value="Buscar">
            </form>
            <div class="v">
                <?php
                include 'conexion.php';


                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];

                    $sql = "SELECT * FROM videos WHERE video LIKE '%$search%'";
                } else {

                    $sql = "SELECT * FROM videos";
                }

                $result = $conn->query($sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($videos = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="videos">
                            <video src="<?= $videos['mp4'] ?>" controls></video>
                            <p><?= $videos['video'] ?></p>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No se han encontrado videos.</p>";
                }
                ?>
            </div>
        </div>
        <a href="../html/indice.html">
            <img src="../css/a/cat-orange-cat.gif" alt="cat" class="cat">
        </a>
    </div>
</body>

</html>
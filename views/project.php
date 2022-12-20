<?php
include './plantilla/head.php';

//Control de acceso 
if (!isset($_SESSION["userSession"])) {
    header("Location:login.php");
}

//Mensajes de Error 
if (!empty($_GET['error'])) {

    switch ($_GET['error']) {
        case 'existe':
?>
            <script>
                swal({
                    title: "ERROR",
                    text: "El archivo ya EXISTE.",
                    icon: "error",
                });
            </script>
        <?php
            break;

        case 'extension':
        ?>
            <script>
                swal({
                    title: "ERROR",
                    text: "El archivo tiene que tener extensión PNG o JPG.",
                    icon: "error",
                });
            </script>
        <?php
            break;

        case 'sucess':
        ?>
            <script>
                swal({
                    title: "¡CORRECTO!",
                    text: "Fichero guardado.",
                    icon: "success",
                    timer: 1700,
                    button: false,
                });
            </script>
        <?php
            break;

        case 'empty':
        ?>
            <script>
                swal({
                    title: "ERROR",
                    text: "Por favor sube un archivo.",
                    icon: "error",
                });
            </script>
<?php
            break;
    }
}

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-4 p-4">

            <form method="POST" enctype="multipart/form-data" action="<?php echo URL . '?page=guardarFichero' ?>">

                <label for="nameProject" class="form-label">Nombre del proyecto</label>
                <input type="text" class="form-control" name="nameProject" id="nameProject" placeholder="">
                <br>

                <label for="contentFile" class="form-label">Selecciona un archivo</label>
                <input type="file" class="form-control" name="contentFile" id="contentFile" placeholder="">
                <br>

                <button type="submit" class="btn btn-primary">Crear</button>

            </form>
        </div>
    </div>
</div>

<?php
include './plantilla/foot.php';

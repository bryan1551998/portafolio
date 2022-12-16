<?php
include './plantilla/head.php';

//Control de acceso 
if (!isset($_SESSION["userSession"])) {
    header("Location:login.php");
}

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-4 p-4">

            <form method="POST" enctype="multipart/form-data">

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

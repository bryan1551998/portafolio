<?php
include './plantilla/head.php';


//Control de acceso 
if (!isset($_SESSION["userSession"])) {
    header("Location:login.php");
}



if ($_POST) {

    // Obtener el SUBMIT
    $nameProject = $_POST['nameProject'];
    $contentFile = $_FILES;
    $target_dir = "../upload/" . $_FILES["contentFile"]["name"];

    // Obtener EXTENSION del archivo
    $imageFileType = strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));

    echo  $imageFileType;

    // Comprobar si EXISTE
    if (file_exists($target_dir)) {
        echo "El Archivo EXISTE!";
    } else {
        if ($imageFileType == 'png' or $imageFileType == 'jpg') {
            // Guardar el ARCHIVO
            move_uploaded_file($_FILES['contentFile']['tmp_name'], $target_dir);
        } else {
            echo 'El archivo tiene que tener extensión PNG o JPJ';
        }
    }
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

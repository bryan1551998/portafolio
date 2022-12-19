<?php
include './plantilla/head.php';


//Control de acceso
if (isset($_SESSION["userSession"])) {
    header("Location:project.php");
}

//Mensajes de Error 
if (!empty($_GET['error'])) {

    switch ($_GET['error']) {
        case 'campos':
?>
            <script>
                swal({
                    title: "ERROR",
                    text: "Credenciales incorrectas",
                    icon: "error",
                });
            </script>
        <?php
            break;

        case 'existe':
        ?>
            <script>
                swal({
                    title: "ERROR",
                    text: "El usuario NO existe",
                    icon: "error",
                });
            </script>
<?php
            break;
    }
}
?>

<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-3 p-4 ">

            <h4 class="text-center m-4">Login</h4>

            <form action="<?php echo URL . '?page=loginUser' ?>" method="post">

                <label for="userLogin" class="form-label">User</label>
                <input type="text" class="form-control" name="userLogin" id="userLogin" aria-describedby="helpId" placeholder="">
                <br>

                <label for="passwordLogin" class="form-label">Password</label>
                <input type="password" class="form-control" name="passwordLogin" id="passwordLogin" placeholder="">
                <br>

                <button type="submit" class="btn btn-primary">Enviar</button>

            </form>

        </div>
    </div>
</div>

<?php
include './plantilla/foot.php';

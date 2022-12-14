<?php
include './plantilla/head.php';
include('../config.php');

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
                    text: "Campos obligatiorios User y Password",
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
                    text: "El USUARIO ya existe",
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
                    text: "Usuario creado",
                    icon: "success",
                    timer: 1700,
                    button: false,
                });
                setTimeout(llamar, 1750);

                function llamar() {
                    alert('Holaahora te redirijo');
                }
            </script>
<?php
            break;
    }
}
?>

<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-3 p-4 ">

            <h4 class="text-center m-4">Registro</h4>

            <form action="<?php echo URL . '?page=register' ?>" method="post">

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

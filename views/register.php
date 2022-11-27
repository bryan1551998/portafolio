<?php
include './plantilla/head.php';
include('../config.php');
?>

<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-3 p-4 ">

            <h4 class="text-center m-4">Registro</h4>

            <?php
            if (!empty($_GET['error'])) {

                echo ' <div class="pt-4 pb-4 errorForm text-center">
                    Campos obligatiorios User y Password
                    </div><br>';
            }
            ?>

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

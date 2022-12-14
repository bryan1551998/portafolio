<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <title>Portafolio</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CSS -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <header>
        <!-- NAV -->
        <nav class="navbar navbar-expand-lg bgNav">
            <div class="container-fluid">

                <!-- Logo -->
                <img src="/img/logo.png" alt="" width="auto" height="65" class="d-inline-block align-text-top">

                <!-- Menu boton -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarNav">


                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php if (!isset($_SESSION["userSession"])) { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="/views/login.php">Login</a>
                            </li>
                            <li>
                                <a class="nav-link" href="/views/registro.php">Register</a>
                            </li>

                        <?php } else { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="/views/project.php">Portafolio</a>
                            </li>

                        <?php } ?>

                    </ul>
                    <span class="navbar-text text-white">
                        <?php if (isset($_SESSION["userSession"])) {
                            echo 'Hola ' . $_SESSION["userSession"];
                        } ?>
                    </span>
                </div>

            </div>
        </nav>

    </header>
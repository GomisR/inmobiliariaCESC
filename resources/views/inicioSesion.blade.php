<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="shortcut icon" href="{{asset('images/logo.jpeg')}}" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/sesionCSS.css') }}">
</head>
<body>
<header>
    <img id="Logo" src="{{asset('images/logo.jpeg')}}" usemap="#logomap"/>
    <map name="logomap" id="logomap">
        <area shape="rect" coords="0,0,213,225" href="{{route('index')}}" alt="Logo" title="Logo"/>
    </map>
    <h1>Inmobiliaria CES</h1>
</header>
<aside>
    <div class="inicioSesion">
        <h2>INICIO DE SESION</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="usuario">
                <label for="Usuario">Nombre de usuario</label><br>
                <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" required>
            </div><br>
            <div class="password">
                <label for="Password">Contraseña</label><br>
                <input type="password" id="Password" name="Password" placeholder="Contraseña" required>
            </div>
            <br><br>
            <div class="botones">
                <button type="submit" name="iniciar">Iniciar</button>
                <a href="./Registrar.php">
                    <button type="button">Registrar</button>
                </a>
            </div>
        </form>
        <?php
        //Procesamos el formulario cuando se envia
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["iniciar"])) {
            //Recuperamos los datos del formulario
            $usuario = $_POST["Usuario"];
            $password = $_POST["Password"];

            if (empty($usuario) || empty($password)) {
                echo "<p style='color: red;'>Todos los campos son necesarios.</p>";
            } else {
                echo "<p style='color: green;'>Inicio de sesión exitoso. Bienvenido a CES $usuario</p>";
            }
        }
        ?>
    </div>
</aside>
</body>
</html>

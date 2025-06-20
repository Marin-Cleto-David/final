<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="tablas.css">
    

</head>

<body>
    <nav class="navbar navbar-light navbarBg">
        <div class="container">
            <a class="navbar-brand in" href="indexd.html" style="color: white;">Inicio</a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="font-menu nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 1</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="hola dropdown-item" href="p1.php">Mostrar datos</a>
                            <a class="dropdown-item" href="p2.php">Mostrar datos</a>
                            <a class="dropdown-item" href="p3.php">Meter datos</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 2</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="p4.php">Escuela</a>
                            <a class="dropdown-item" href="p5.php">Escuela Ingresar</a>
                            <a class="dropdown-item" href="p6.php">Compras</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 3</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="pok6.html">Pokemon</a>
                            <a class="dropdown-item" href="pe7.html">Peliculas</a>
                            <a class="dropdown-item" href="p9.php">Nueve</a>
                        </div>
                    </li>

                    
                </ul>
            </div>
            

        </div>
    </nav>

   <div class="jumbotron">
    <h1 class="display-4">Mostrar Datos</h1>
    <?php
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "database";

    $conexion = new mysqli($servername, $username, $password, $database);
    if ($conexion->connect_error) {
        die("Conexion Fallida: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM jjk";
    $resultado = $conexion->query($sql);
    ?>

    <div class="container">
        <h2 class="display-4">DATOS DE PERSONAJES DE JUJUTSU KAISEN</h2>

            <?php if($resultado->num_rows > 0): ?>
<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Altura</th>
        <th>Técnica</th>
        <th>Grado</th>
        <th>Expansión de Dominio</th>
        <th>Especie</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()): ?>
    <tr>
        <td><?php echo $fila['id']; ?></td>
        <td><?php echo $fila['Nombre']; ?></td>
        <td><?php echo $fila['Edad']; ?></td>
        <td><?php echo $fila['Altura']; ?></td>
        <td><?php echo $fila['Tecnica']; ?></td>
        <td><?php echo $fila['Grado']; ?></td>
        <td><?php echo $fila['Expansión de Dominio']; ?></td>
        <td><?php echo $fila['Especie']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<?php else: ?>
<p>No se encontraron los personajes</p>
<?php endif; ?>
</div>
</div>
<html>
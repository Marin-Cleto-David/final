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
    
    
    <h2 class="display-4">DATOS DE PERSONAJES DE JUJUTSU KAISEN</h2>
    
    
    <div class="container1">
        
    <?php
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "database";

  $conexion = new mysqli($servername, $username, $password, $database);
  if ($conexion->connect_error) {
      die("Conexion Fallida: " . $conexion->connect_error);
  }


    function insertarPersonaje($conexion){

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        var_dump($_POST);
        $Nombre = $conexion->real_escape_string($_POST["Nombre"]);
        $Edad = $conexion->real_escape_string($_POST["Edad"]);
        $Altura = $conexion->real_escape_string($_POST["Altura"]);
        $Tecnica = $conexion->real_escape_string($_POST["Tecnica"]);
        $Grado = $conexion->real_escape_string($_POST["Grado"]);
        $Expansión_de_Dominio = $conexion->real_escape_string($_POST["Expansión de Dominio"]);
        $Especie = $conexion->real_escape_string($_POST["Especie"]);

        $sql = "INSERT INTO jjk (Nombre, Edad, Altura, Tecnica, Grado, Expansión de Dominio, Especie)
        VALUES ('$Nombre', '$Edad', '$Altura', '$Tecnica', '$Grado', '$Expansión_de_Dominio', '$Especie')";
        if($conexion->query($sql)===TRUE){
            echo "<p class='success'>Nuevo nombre agregado con exito. </p>";
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }else{
            echo "<p class='error'>error al agregar nombre:" . $conexion->error . "</p>";
        }
    }
}

insertarPersonaje($conexion);

$sql = "SELECT * FROM jjk";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Edad</th><th>Altura</th><th>Tecnica</th>
    <th>Grado</th><th>Expansión de Dominio</th><th>Especie</th></tr>";
    while($row = $resultado->fetch_assoc()){
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Edad"] . "</td>
        <td>" . $row["Altura"] . "</td><td>" . $row["Tecnica"] . "</td><td>" . $row["Grado"] . "</td>
        <td>" . $row["Expansión de Dominio"] . "</td><td>" . $row["Especie"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron registros en la base de datos</p>";
}
        $conexion->close();
        ?>
    </div>
</body>
</html>
<?php
    ob_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "escuela";

    $conexion = new mysqli($servername, $username, $password, $database);
    if ($conexion->connect_error) {
        die("Conexion Fallida: " . $conexion->connect_error);
    }

    $sql_edad = "SELECT id, edad FROM edades";
    $sql_colonias = "SELECT id, nombre_colonia FROM colonias";
    $sql_especialidades = "SELECT id, nombre_especialidad FROM especialidades";
    $sql_generos = "SELECT id, nombre_genero FROM generos";
    
    $result_edad = $conexion->query($sql_edad);
    $result_colonias = $conexion->query($sql_colonias);
    $result_especialidades = $conexion->query($sql_especialidades);
    $result_generos = $conexion->query($sql_generos);


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELACIONES</title>

    
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
        <h1>PAGINA DE MOSTRAR DATOS RELACIONALES</h1>
   
    
    <div class="contenedor">
        <div class="container1">
            
        <form method="POST" id="formulario">
            
        <div class="form-group"><label for="numero_control">Numero de Control: </label>
        <input type="text" id="numero_control" name="numero_control" required><br></div>
        <div class="form-group"><label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre"required><br></div>
        <div class="form-group"><label for="apellido_paterno">Apellido Paterno: </label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required><br></div>
        <div class="form-group"><label for="apellido_materno">Apellido Materno: </label>
        <input type="text" id="apellido_materno" name="apellido_materno" required><br></div>

        <div class="form-group"><label for="edad">Edad: </label>
        <select name="edad" required>
            <option value="">Selecciona una edad</option>
            <?php
            if ($result_edad->num_rows > 0) {
                while($row = $result_edad->fetch_assoc()){
                    echo "<option value='" . $row["id"] . "'>" . $row["edad"] . "</option>";
                }
            }
            ?>
        </select></div>

        <div class="form-group"><label for="colonia">Colonia: </label>
        <select name="colonia" required>
        <option value="">Selecciona una colonia</option>
            <?php
            if ($result_colonias->num_rows > 0) {
                while($row = $result_colonias->fetch_assoc()){
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_colonia"] . "</option>";
                }
            }
            ?>
        </select></div>

        <div class="form-group"><label for="especialidad">Especialidad: </label>
        <select name="especialidad" required>
        <option value="">Selecciona una especialidad</option>
            <?php
            if ($result_especialidades->num_rows > 0) {
                while($row = $result_especialidades->fetch_assoc()){
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_especialidad"] . "</option>";
                }
            }
            ?>
        </select></div>

        <div class="form-group"><label for="genero">Genero: </label>
        <select name="genero" required>
        <option value="">Selecciona un genero</option>
            <?php
            if ($result_generos->num_rows > 0) {
                while($row = $result_generos->fetch_assoc()){
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_genero"] . "</option>";
                }
            }
            ?>
        </select></div>

        <div class="form-group"><label for="correo">Correo: </label>
        <input type="email" id="correo" name="correo" required><br></div>
        <div class="form-group"><label for="telefono">Telefono: </label>
        <input type="text" id="telefono" name="telefono" required><br></div>
        <div class="form-group"><label for="fecha_ingreso">Fecha de Ingreso: </label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" required><br></div>

        <div class="form-group"><input type="submit" value="Agregar Registro"></div>

        </form>

    
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $username = "root";
        $password = "";
        $servername = "localhost";
        $database = "escuela";

        $conexion = new mysqli($servername, $username, $password, $database);
        if ($conexion->connect_error) {
            die("Conexion Fallida: " . $conexion->connect_error);
        }

        function insertarAlumno($conexion)
        
        {
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                var_dump($_POST);
                $numero_control = $conexion->real_escape_string($_POST ["numero_control"]);
                $nombre = $conexion->real_escape_string($_POST ["nombre"]);
                $apellido_paterno = $conexion->real_escape_string($_POST ["apellido_paterno"]);
                $apellido_materno = $conexion->real_escape_string($_POST ["apellido_materno"]);
                $edad = $conexion->real_escape_string($_POST["edad"]);
                $colonia = $conexion->real_escape_string($_POST["colonia"]);
                $especialidad = $conexion->real_escape_string($_POST["especialidad"]);
                $genero = $conexion->real_escape_string($_POST["genero"]);
                $correo = $conexion->real_escape_string($_POST ["correo"]);
                $telefono = $conexion->real_escape_string($_POST ["telefono"]);
                $fecha_ingreso = $conexion->real_escape_string($_POST ["fecha_ingreso"]);
            
                $sql = "INSERT INTO alumnos (numero_control, nombre, apellido_paterno, 
                apellido_materno, id_edad, id_colonia, id_especialidad, id_genero, correo, telefono, fecha_ingreso)

                VALUES ('$numero_control', '$nombre', '$apellido_paterno', '$apellido_materno',
                '$edad', '$colonia', '$especialidad', '$genero', '$correo', '$telefono', '$fecha_ingreso')";
            
                if ($conexion->query($sql) == TRUE) {
                    echo "<p class='success'>Nuevo alumno agrregado con éxito.</p>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "<p class='error'>Error al agregar al alumno: " . $conexion->error . "</p>";
                }
            }
        }

        insertarAlumno($conexion);

        "SELECT id, id_edad FROM edades";
        "SELECT id, id_nombre_colonia FROM colonias";
        "SELECT id, id_nombre_especialidad FROM especialidades";
        "SELECT id, id_nombre_genero FROM generos";
      $sql = "SELECT 
            alumnos.id, 
            alumnos.numero_control, 
            alumnos.nombre, 
            alumnos.apellido_paterno, 
            alumnos.apellido_materno,
            edades.edad, 
            colonias.nombre_colonia, 
            especialidades.nombre_especialidad, 
            generos.nombre_genero,
            alumnos.correo, 
            alumnos.telefono, 
            alumnos.fecha_ingreso
        FROM alumnos
        JOIN edades ON alumnos.id_edad = edades.id
        JOIN colonias ON alumnos.id_colonia = colonias.id
        JOIN especialidades ON alumnos.id_especialidad = especialidades.id
        JOIN generos ON alumnos.id_genero = generos.id";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

            echo "<table class= 'table table-bordered'>";
            echo "<tr><th>id</th><th>No. Control</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Edad</th>
            <th>Colonia</th><th>Especilidad</th><th>Genero</th><th>Correo</th><th>Telefono</th><th>Fecha Ingreso</th></tr>";
            while($row = $resultado->fetch_assoc()){
                echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['numero_control'] . "</td>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['apellido_paterno'] . "</td>
                <td>" . $row['apellido_materno'] . "</td>
                <td>" . $row['edad'] . "</td>
                <td>" . $row['nombre_colonia'] . "</td>
                <td>" . $row['nombre_especialidad'] . "</td>
                <td>" . $row['nombre_genero'] . "</td>
                <td>" . $row['correo'] . "</td>
                <td>" . $row['telefono'] . "</td>
                <td>" . $row['fecha_ingreso'] . "</td>
                </tr>";
            }
            echo "</table>";
        }   else{
            echo "<p>No se encontraron registros en la base de datos</p>";
        }
        $conexion->close();
        ?>
    </div>
</div>
    </div>



</body>
</html>
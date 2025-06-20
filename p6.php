<?php
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "compras";

    $conexion = new mysqli($servername, $username, $password, $database);
    if ($conexion->connect_error) {
        die("Conexion Fallida: " . $conexion->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $id_categoria = $_POST["categoria"];
        $sql = "INSERT INTO productos (nombre, precio, id_categoria)
        VALUES ('$nombre', '$precio', '$id_categoria')";
        if ($conexion->query($sql) == TRUE) {
            echo "<p style='color: White';>Producto agregado correctamente</p>";
        }else {
            echo "<p class='error'>Error al agregar el producto: " . $conexion->error . "</p>";
        }
    }
    $sql_categorias = "SELECT * FROM categorias";
    $result_categorias = $conexion->query($sql_categorias);
?>
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
    <h1>Registrar nuevos productos</h1>
    <form method="POST" id="formulario">
        <div class="container1">
        <div class="form-group"><label>nombre del producto: </label>
        <input type="text" name="nombre" required><br></div>

        <div class="form-group"><label>precio: </label>
        <input type="number" name="precio" required><br></div>

        <div class="form-group"><label>categoria: </label>
        <select name="categoria" required>
            <option value="">seleccionar categoria</option>
            <?php
            if ($result_categorias->num_rows > 0) {
                while($row = $result_categorias->fetch_assoc()){
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                }
            }
            ?>
            </select></div><br></br>
            <input type="submit" value="Agregar producto">
        </form>
        
        <h2>Lista de Productos</h2>
        <div class="container1">
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
            </tr>
            <?php
            $sql_productos = "SELECT productos.id, productos.nombre, productos.precio, categorias.nombre AS 
            categoria
            FROM productos 
            JOIN categorias ON productos.id_categoria = categorias.id";
            
            
            $result_productos = $conexion->query($sql_productos);
            if($result_productos->num_rows>0){
                while($row = $result_productos->fetch_assoc()){
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['precio']}</td>
                    <td>{$row['categoria']}</td>
                    </tr>";
                }
            } else {
                echo "<tr>No hay productos registrados</tr>";
            }

            ?>
        </table>
        </div>
    </body>
</html>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre = $_POST["nombre"];
  $nombre = strtolower($nombre);

  #Se construye la consulta como un string
 	$query = "SELECT sum(entradas.precio)
            from entradas
            where entradas.id_evento = all (
              select eventos.id
              from eventos
              where eventos.nombre = '$nombre');";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$datos = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th> Ingreso total </th>
    </tr>
  
      <?php
        // echo $datos;
        foreach ($datos as $d) {
          echo "<tr><td>$d[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

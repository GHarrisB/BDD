<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre = $_POST["nombre"];
  $nombre = strtolower($nombre);

  #Se construye la consulta como un string
 	$query = "SELECT artistas.nombre, artistas.telefono
            from artistas, eventos, presentacion
            where eventos.id = presentacion.id_evento
            and presentacion.id_artista = artistas.id
            and eventos.id_prod = all (
              select productoras.id
              from productoras
              where productoras.nombre = '$nombre');
            ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$datos = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th> Nombre artista </th>
      <th> Número de contacto </th>
    </tr>
  
      <?php
        // echo $datos;
        foreach ($datos as $d) {
          echo "<tr><td>$d[0]</td><td>$d[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

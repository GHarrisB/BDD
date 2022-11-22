<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre = $_POST["nombre"];
  $nombre = strtolower($nombre);

  #Se construye la consulta como un string
 	$query = "SELECT id, nombre, fecha_ini, fecha_fin, id_recinto, id_prod
            from eventos
            where eventos.fecha_ini = (
              select max(fecha_ini)
              from eventos
              where eventos.id_prod = (
                select productoras.id
                from productoras
                where productoras.nombre = '$nombre'))
            order by id;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$datos = $result -> fetchAll();
  ?>

<h3> Si no hay nada es porque la productora no ha producido ningún evento </h3>

  <table align="center">
    <tr>
      <th> ID </th>
      <th> Nombre </th>
      <th> Fecha de Inicio </th>
      <th> Fecha de Término </th>
      <th> ID del recinto </th>
      <th> ID de la productora </th>
    </tr>
  
      <?php
        // echo $datos;
        foreach ($datos as $d) {
          echo "<tr><td>$d[0]</td><td>$d[1]</td><td>$d[2]</td><td>$d[3]</td><td>$d[4]</td><td>$d[5]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

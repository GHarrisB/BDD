<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario

  #Se construye la consulta como un string
 	$query = "SELECT eventos.id, eventos.nombre, eventos.fecha_ini, eventos.fecha_fin, eventos.id_recinto, eventos.id_prod, count(*) as cantidad
            from eventos, presentacion
            where eventos.id = presentacion.id_evento
            group by eventos.id
            order by cantidad desc;
            ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$datos = $result -> fetchAll();
  ?>

<h3> Si un evento no sale en la lista, es porque no hay ningún artista que se presente </h3>

  <table align="center">
    <tr>
      <th> ID </th>
      <th> Nombre </th>
      <th> Fecha de Inicio </th>
      <th> Fecha de Término </th>
      <th> ID del recinto </th>
      <th> ID de la productora </th>
      <th> Cantidad de artistas que se presentan </th>
    </tr>
  
      <?php
        // echo $datos;
        foreach ($datos as $d) {
          echo "<tr><td>$d[0]</td><td>$d[1]</td><td>$d[2]</td><td>$d[3]</td><td>$d[4]</td><td>$d[5]</td><td>$d[6]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

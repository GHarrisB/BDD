<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario

  #Se construye la consulta como un string
 	$query = "SELECT productoras.nombre, count(*) as cnt_evnt
            from eventos, productoras
            where eventos.id_prod = productoras.id
            group by productoras.id
            order by cnt_evnt desc;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$datos = $result -> fetchAll();
  ?>

<h3> Si una productora no sale en la lista, es porque no ha producido ningún evento </h3>

  <table align="center">
    <tr>
      <th> Nombre </th>
      <th> Cantidad de eventos producidos </th>
    </tr>
  
      <?php
        // echo $datos;
        foreach ($datos as $d) {
          echo "<tr><td>$d[0]</td><td>$d[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

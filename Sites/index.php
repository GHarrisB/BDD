<?php include('templates/header.html');   ?>

<body>
  <h1 align="center"> DCCarrete </h1>
  <p style="text-align:center;"> Aquí podrás encontrar información sobre la base de datos. </p>

  <br>

  <h3 align="center"> Obtener nombres y número de contacto de todas las productoras </h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Obtener nombre de la productora y cantidad de eventos que han producido </h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Obtener datos del último evento producido por la productora: </h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Nombre de la productora:
    <input type="text" name="nombre">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Obtener todos los artistas que han trabajado con la productora: </h3>

  <form align="center" action="consultas/consulta_4.php" method="post">
    Nombre de la productora:
    <input type="text" name="nombre">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Obtener ingreso total por ventas de entradas del evento: </h3>

  <form align="center" action="consultas/consulta_5.php" method="post">
    Nombre del evento:
    <input type="text" name="nombre">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Obtener todos los eventos junto al número de artistas que se presentan </h3>

  <form align="center" action="consultas/consulta_6.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>
  <br>

  <h3 align="center"> Obtener nombre del evento que tiene mayor cantidad de entradas vendidas </h3>

  <form align="center" action="consultas/consulta_7.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>
</html>

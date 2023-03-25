<html>
<head>
  <title>Programando Ando</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>

  <!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

    <center><h1>REGISTRO DE PERSONAS</h1></center>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      <label for="doc">Documento</label>
      <input type="text" name="doc" class="form-control" id="doc">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="dir">Direccion </label>
        <input type="text" name="dir" class="form-control" id="dir">
    </div>

    <div class="form-group">
        <label for="tel">Telefono </label>
        <input type="text" name="tel" class="form-control" id="tel">
    </div>
    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

      
  
  </form>


  <?php
    include("abrir_conexion.php");
      
      $doc    ="1233221321";
      $nombre ="";
      $dir    ="";
      $tel    ="";

      if(isset($_POST['btn_registrar']))
      {      
        $doc = $_POST['doc'];
        $nombre = $_POST['nombre'];
        $dir = $_POST['dir'];
        $tel = $_POST['tel'];


        if($doc=="" || $dir=="" || $tel=="")
        {
          echo "Los campos son obligatorio";
        }
        else
        {
          //INSERTAR
          mysqli_query($conexion, "INSERT INTO $tabla_db1 
          (doc, nombre, direccion, telefono) 
          values 
          ('$doc','$nombre','$dir','$tel')");
        }
      }

      if(isset($_POST['btn_consultar']))
      {
        $doc = $_POST['doc'];
        $existe = 0;

        if($doc=="")
        {
          echo "EL campo documento es obligatorio";
        }
        else
        {
        //CONSULTAR
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE doc = '$doc'");
        while($consulta = mysqli_fetch_array($resultados))
        {
          echo $consulta["doc"]."<br>";
          echo $consulta["nombre"]."<br>";
          echo $consulta["direccion"]."<br>";
          echo $consulta["telefono"]."<br>";
          $existe++;
        }
        if($existe==0){echo "El documento no existe";}
        }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $doc = $_POST['doc'];
        $nombre = $_POST['nombre'];
        $dir = $_POST['dir'];
        $tel = $_POST['tel'];


        if($doc=="" || $dir=="" || $tel=="")
        {
          echo "Los campos son obligatorio";
        }
        else
        {
          $existe=0;
          //CONSULTAR
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE doc = '$doc'");
        while($consulta = mysqli_fetch_array($resultados))
        {
          $existe++;
        }
        if($existe==0)
          {
            echo "El documento no existe";
          }
          else
          {
            //ACTUALIZAR 
          $_UPDATE_SQL="UPDATE $tabla_db1 Set 
          doc='$doc', 
          nombre='$nombre',
          direccion='$dir',
          telefono='$tel'

          WHERE doc='$doc'"; 

          mysqli_query($conexion,$_UPDATE_SQL);
          echo "Actualizacion con Exito";
          }

        }
      }

      if(isset($_POST['btn_eliminar']))
      {
        $doc = $_POST['doc'];
        $existe = 0;

        if($doc=="")
        {
          echo "EL campo documento es obligatorio";
        }
        else
        {
        //CONSULTAR
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE doc = '$doc'");
        while($consulta = mysqli_fetch_array($resultados))
        {
          $existe++;
        }
        if($existe==0)
          {echo "El documento no existe";}
        else
        {
          //ELIMINAR
          $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE doc = '$doc'";
          mysqli_query($conexion,$_DELETE_SQL);
        }
        }
      }

    include("cerrar_conexion.php");
  ?>

  </div>


<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div>

<div class="content_gral">
        <div class="content izq">

          <div class="content_player-datos">
            <h3>Player 1</h3>
            <div class="jugador J1"></div><br>
            <input type="text"><br>
            <h3>* Ranking *</h3><br>
            <h1>1°</h1>
          </div>

          <div class="content_player-datos">
            <h3>Player 2</h3>
            <div class="jugador J2"></div><br>
            <input type="text"><br>
            <h3>* Ranking *</h3><br>
            <h1>2°</h1>
          </div>

        </div>

        <div class="content cent">
          <h3>RESULTADO</h3><br><br>

          Player_1/Player_2 6 | 4 | 6 <br>
          Player_3/player_4 3 | 6 | 4 <br>

        </div>

        <div class="content der">

          <div class="content_player-datos">
            <h3>Player 3</h3>
            <div class="jugador J3"></div><br>
            <input type="text"><br>
            <h3>* Ranking *</h3><br>
            <h1>3°</h1>
          </div>

          <div class="content_player-datos">
            <h3>Player 4</h3>
            <div class="jugador J4"></div><br>
            <input type="text"><br>
            <h3>* Ranking *</h3><br>
            <h1>4°</h1>
          </div>

        </div>
      </div>
    </div>



  
  
</body>
</html>
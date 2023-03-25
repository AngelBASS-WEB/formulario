<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>

  <header>
    <h1>PADEL CUP</h1>
  </header>

  <form amethod="POST" action="index.php">

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


  </form>


  <?php
      include("abrir_conexion.php");
      
      $player_1 ="";
      $player_2 ="";
      $player_3 ="";
      $player_4 ="";

      if(isset($_POST['btn_registrar']))
      {      
        echo $consulta["player_1"]."<br>";
        echo $consulta["player_2"]."<br>";
        echo $consulta["player_3"]."<br>";
        echo $consulta["player_4"]."<br>";


        if($player_1=="" || $player_2=="" || $player_3=="" || $player_4=="")
        {
          echo "Los campos son obligatorio";
        }
        else
        {
          //INSERTAR
          mysqli_query($conexion, "INSERT INTO $tabla_db1 
          (player_1, player_2, player_3, player_4) 
          values 
          ('$player_1','$player_2','$player_3','$player_4')");
        }
      }

      if(isset($_POST['btn_consultar']))
      {
        $player_1 = $_POST['player_1'];
        $existe = 0;

        if($player_1=="")
        {
          echo "EL campo documento es obligatorio";
        }
        else
        {
        //CONSULTAR
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE player_1 = '$player_1'");
        while($consulta = mysqli_fetch_array($resultados))
        {
          echo $consulta["player_1"]."<br>";
          echo $consulta["player_2"]."<br>";
          echo $consulta["player_3"]."<br>";
          echo $consulta["player_4"]."<br>";
          $existe++;
        }
        if($existe==0){echo "El documento no existe";}
        }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $player_1 = $_POST['player_1'];
        $player_2 = $_POST['player_2'];
        $player_3 = $_POST['player_3'];
        $player_4 = $_POST['player_4'];


        if($player_1=="" || $player_2=="" || $player_3=="" || $player_4=="")
        {
          echo "Los campos son obligatorio";
        }
        else
        {
          $existe=0;
          //CONSULTAR
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE player_1 = '$player_1'");
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
          player_1='$player_1', 
          player_2='$player_2',
          player_3='$player_3',
          player_4='$player_4'

          WHERE player_1='$player_1'"; 

          mysqli_query($conexion,$_UPDATE_SQL);
          echo "Actualizacion con Exito";
          }

        }
      }

      if(isset($_POST['btn_eliminar']))
      {
        $player_1 = $_POST['player_1'];
        $existe = 0;

        if($player_1=="")
        {
          echo "EL campo documento es obligatorio";
        }
        else
        {
        //CONSULTAR
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE player_1 = '$player_1'");
        while($consulta = mysqli_fetch_array($resultados))
        {
          $existe++;
        }
        if($existe==0)
          {echo "El documento no existe";}
        else
        {
          //ELIMINAR
          $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE player_1 = '$player_1'";
          mysqli_query($conexion,$_DELETE_SQL);
        }
        }
      }

      include("cerrar_conexion.php");
  ?>

</body>
</html>
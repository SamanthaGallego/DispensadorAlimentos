<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $us = $_SESSION['user_name'];

    if ($us == "") {
        header("Location: index.php");
    }

    $url_rest_get = "http://localhost:3000/datos/";
    $cur1_get = curl_init($url_rest_get);
    curl_setopt($cur1_get, CURLOPT_RETURNTRANSFER, true);
    $respuesta_get = curl_exec($cur1_get);

    curl_close($cur1_get);
    $resp_get = json_decode($respuesta_get);

    $tam_get = count($resp_get);

    ?>

    <form action="datosdatos.php" method="post">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-nav-bar"  >
      <div class="container-fluid"style="background-color: #fff2cc;">
        
          <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarExample01"
              aria-controls="navbarExample01"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarExample01">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" aria-current="page" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
            
            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Usuario
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="crearusuarioadmin.php">Crear</a></li>
                  <li><a class="dropdown-item" href="eliminarusuario.php">Eliminar</a></li>
                  <li><a class="dropdown-item" href="datosusuario.php">Ver datos</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Alertas
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="crearalertas.php">Crear</a></li>
                  <li><a class="dropdown-item" href="eliminaralertas.php">Eliminar</a></li>
                  <li><a class="dropdown-item" href="datosalertas.php">Ver datos</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Datos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="creardatos.php">Crear</a></li>
                  <li><a class="dropdown-item" href="eliminardatos.php">Eliminar</a></li>
                  <li><a class="dropdown-item" href="datosdatos.php">Ver datos</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dispensador
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="creardispensador.php">Crear</a></li>
                  <li><a class="dropdown-item" href="eliminardispensador.php">Eliminar</a></li>
                  <li><a class="dropdown-item" href="datosdispensador.php">Ver datos</a></li>
                </ul>
              </li>
          
            </ul> 
          
          </div>
        
      </div>
    
    
  </nav>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Id datos</th>
                    <th>Id dispensador</th>
                    <th>Nivel alimento</th>
                    <th>Alerta</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    for ($i = 0; $i <= $tam_get - 1; $i++) {
                        $result = $resp_get[$i];
                        $id_datos = $result -> id_datos;
                        $id_dis = $result->id_dispensador;
                        $na = $result->nivel_alimento;
                        $alt = $result->alerta;
                        $f = $result->fecha;

                        echo "<tr>";
                        echo "<td>";
                        echo $id_datos;
                        echo "</td>";
                        echo "<td>";
                        echo $id_dis;
                        echo "</td>";
                        echo "<td>";
                        echo $na;
                        echo "</td>";
                        echo "<td>";
                        echo $alt;
                        echo "</td>";
                        echo "<td>";
                        echo $f;
                        echo "</td>";
                        echo "</tr>";


                    }

                    ?>
                </tr>
            </tbody>
        </table>
    </form>
</body>
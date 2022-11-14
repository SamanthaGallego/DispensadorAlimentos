<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
      integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
      crossorigin="anonymous"></script>
</head>
<body>
    <?php
     session_start();
     $us = $_SESSION['user_name'];
 
     if ($us == "") {
         header("Location: index.php");
     }
 
     $url_rest_get = "http://localhost:3000/dispensador/u/$us";
     $cur1_get = curl_init($url_rest_get);
     curl_setopt($cur1_get, CURLOPT_RETURNTRANSFER, true);
     $respuesta_get = curl_exec($cur1_get);
 
     curl_close($cur1_get);
     $resp_get = json_decode($respuesta_get);
 
     $tam = count($resp_get);
     $tam2=0;

     if ($_GET) {
 
 
         $id = $_GET['id'];
 
         $url_rest = "http://localhost:3000/datos/dis/$id";
         $cur2_get = curl_init($url_rest);
         curl_setopt($cur2_get, CURLOPT_RETURNTRANSFER, true);
         $respuesta_get2 = curl_exec($cur2_get);
     
         curl_close($cur2_get);
         $resp_get2 = json_decode($respuesta_get2);
     
         $tam2 = count($resp_get2);
 
     }
       ?>
</body>
 
    <!-- <br><a href="logout.php">Cerrar sesion</a> -->
<header>
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
                  <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                </li>
                
            </ul> 
          
          </div>
        
      </div>
    
    
  </nav>
</header>
  <section style="background-color: #eee;"> 

    
        <div class="card mb-4">
          <div class="card-body text-center ">
        
            <img src="https://cdn.pixabay.com/photo/2021/02/12/07/05/woman-6007535_960_720.png" alt="avatar"
              class="rounded-circle img-fluid" style="height: 150px; width: 150px;">
              <?php
                $us=$_SESSION['user_name'];
                echo "<h5>$us</h5>"
                
            ?>
            <p class="text-muted mb-1">Cliente</p>            
            
          </div>
    </div>

    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Id dispensador</th>
          <th>Alto cabina</th>
          <th>User Name</th>
          <th>Estado</th>
          <th>Acción</th>
        </tr>
      </thead>
      
        <tbody>
        <?php
        for ($i = 0; $i <= $tam - 1; $i++) {
                        $result = $resp_get[$i];
                        $id_dis = $result->id_dispensador;
                        $alt = $result->alto_cabina;
                        $user = $result->user_name;
                        $est = $result->estado;

                        echo "<tr>";
                        echo "<td>";
                        echo $id_dis;
                        echo "</td>";
                        echo "<td>";
                        echo $alt;
                        echo "</td>";
                        echo "<td>";
                        echo $user;
                        echo "</td>";
                        echo "<td>";
                        echo $est;
                        echo "</td>";
                        echo "<td>";
                        echo "<a href=\"?id=" . $id_dis . "\">Mostrar</a>";
                        echo "</td>";
                        echo "</tr>";
        }
    ?>

      </tbody>
    </table>
<br><br>
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
        <?php
        
        for ($i = 0; $i <= $tam2 - 1; $i++) {
            $result = $resp_get2[$i];
            $id_dat = $result->id_datos;
            $id_dis = $result->id_dispensador;
            $na = $result->nivel_alimento;
            $alt = $result->alerta;
            $f = $result->fecha;

            echo "<tr>";
            echo "<td>";
            echo $id_dat;
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

      </tbody>
    </table>

</section>
</body>
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
     $us=$_SESSION['user_name'];
         
     if($us== "") 
     { 
         header("Location: index.php");
     }
    if(isset($_POST["enviar"])){
        
        $an = $_POST["alertanivel"];
        $e = $_POST["estado"];


        $url_rest = "http://localhost:3000/alertas";
        $data = array(
            "alertanivel" => $an,
            "estado" => $e
        );
        $data_string = json_encode($data);
        $curl = curl_init($url_rest);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );

        $result = curl_exec($curl);
        if(isset($_POST["enviar"])){
            session_start();
            header("Location: exito.php"); 
        }else{
            header("Location: exito.php"); 
        }
    }
    else{
        
    ?>  
<!-- Section: Design Block -->
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
</header>
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Crear alertas</h2>
            <form action="crearalertas.php" method="post">
              <!--  Email input 
              <div class="form-outline mb-4">
                <input type="text" name="id_alertas" class="form-control" />
                <label class="form-label" for="form3Example3">User_name</label>
              </div> -->

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="boolean" name="alertanivel" class="form-control" />
                <label class="form-label" for="form3Example4">Alerta nivel (0 ó 1)</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="estado" class="form-control" />
                <label class="form-label" for="form3Example3">Estado</label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="enviar" class="btn btn-primary btn-block mb-4">
                Registrar
              </button>

              <!-- Register buttons -->
              <div class="text-center">
              
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0" style="
      height: 650px;">
        <img src="https://www.xtrafondos.com/wallpapers/vertical/gato-6965.jpg" class="w-100 rounded-4 shadow-4"
          alt="" style="
      height: 95%;"/>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block 
    <?php } ?>
</body>
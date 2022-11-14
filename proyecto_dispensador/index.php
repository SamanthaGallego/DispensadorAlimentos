<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <?php

    if(isset($_POST["enviar"])){
        echo "<h2> el usuario dio clic en enviar </h2>";
        $u = $_POST["user_name"];
        $p = $_POST["pass"];
        $url_rest = "http://localhost:3000/usuario/$u";
        $curl = curl_init($url_rest);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);

        if($respuesta===false){
            curl_close($curl);
            die ("Error...");
        }

        curl_close($curl);
        $resp = json_decode($respuesta);
        $tam = count($resp);

        if ($tam == 0)
            {
               header("Location: index.php"); 
            }
            else
            {
                $result = $resp[0];
                $pass = $result -> password;
                $rol = $result -> rol;
                $id_dispensador = $result -> id_dispensador;

                if ($pass == $p){
                    session_start();
                    $_SESSION['user_name'] =$u;
                    $_SESSION['password']=$pass;
                    $_SESSION['rol']=$rol;
                    $_SESSION['id_dispensador']=$id_dispensador;

                    if($rol=="admin"){
                        header("Location: admin.php"); 
                    }
                    else {
                        header("Location: cliente.php"); 
                    }
                }
                else {
                    header("Location: index.php"); 
                }
            }    
    }
    else
    {

  ?>
</body>
   
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white"  >
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
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="crearusuario.php">SignUp</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
</header>
<!-- Section: Design Block -->
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
            <h2 class="fw-bold mb-5">Iniciar sesion</h2>
            <form action="index.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="user_name" class="form-control" />
                <label class="form-label" for="form3Example3">user_name</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="pass" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="enviar" class="btn btn-primary btn-block mb-4">
                Iniciar
              </button>

              <!-- Register buttons -->
              <div class="text-center">
              <a href="crearusuario.php">Crear Usuario</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0"  style="
      height: 650px;">
     
        <img src="https://images.fineartamerica.com/images-medium-large-5/mature-golden-retriever-dog-portrait-animal-images.jpg"  class="w-100 rounded-4 shadow-4"
          alt=""  style="
      height: 90%; "/>
      </div>
    </div>
  </div>

  <!-- Jumbotron -->
</section>

<?php } ?>

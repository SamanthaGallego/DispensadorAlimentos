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
        
        $u = $_POST["user_name"];
        $p = $_POST["pass"];
        $r = $_POST["rol"];
        $n = $_POST["id_dispensador"];


        $url_rest = "http://localhost:3000/usuario";
        $data = array(
            "user_name" => $u,
            "password" => $p,
            "rol"=>$r,
            "id_dispensador" => $n
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
            header("Location: index.php"); 
        } 
    }
    else{
        
    ?>
<!-- Section: Design Block -->
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
            <h2 class="fw-bold mb-5">Sign UP</h2>
            <form action="crearusuario.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="user_name" class="form-control" />
                <label class="form-label" for="form3Example3">User_name</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="pass" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="rol" class="form-control" />
                <label class="form-label" for="form3Example3">Rol</label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="enviar" class="btn btn-primary btn-block mb-4">
                Registrarse
              </button>

              <!-- Register buttons -->
              <div class="text-center">
              <label class="form-label" for="form3Example3">¿Ya esta registrado?</label>
              <a href="index.php">Iniciar sesion</a>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0" style="
      height: 650px;">
        <img src="https://images.unsplash.com/photo-1596662100219-5903f73416a3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDl8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80" class="w-100 rounded-4 shadow-4"
          alt="" style="
      height: 95%;"/>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section> 
    <?php } ?>
</body>
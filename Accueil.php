<?php  require('sign_in_Action.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>
<body>
    <!-- barre de navigation -->
    <?php  include('header.php'); ?>
      
    <section class="my-3">
        <div class="container" style="background: rgb(244, 244, 237)">
            <div class="row gy-3 align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold">Ihr Paket sicher empfangen</h1>
                    <h2 class="fw-light">Ihr Paket auf entfernte Weise zu empfangen war noch nie so einfach wie jetzt </h2>
                </div>
                <div class="col-12 col-md-6 pe-0">
                    <img src="Img/bild2.png" alt="ProfilBild" class="w-100" />
                </div>
            </div>
        </div>
    </section>

    <div class="container py-3">
        <div class=" col-12 col-md-8 ">
            <p class="text-warning text-align fw-bold">
                <span>Loggen Sie sich in Ihr Online-HAUS ein. wenn Sie noch nicht registriert sind,<a class="text-decoration-none" href="./Inscription.php"> Registrieren Sie sich</a></span>
            </p>
        </div>    
    </div>
     
     <!-- Formular -->
     <div class=" col-12 col-md-6 offset-md-1 bg-light px-4 pb-1 mb-2">
        <?php if(isset($errorMsg)):?>
            <div class="alert alert-danger" role="alert">
                <?php if(isset($errorMsg)){ echo '<h6>' .$errorMsg. '</h6>';}?>
            </div>
        <?php endif;?>
        

        <form action="" method="post" class="row gy-2 ">
            <div class="row g-1 align-items-center">
                <div class="col-10  col-md-10 col-lg-10">
                    <label for="username" class="col-form-label">Username</label>
                  </div>
                  <div class="col-10  col-md-10 col-lg-10" style="width: 250px;">
                    <input name="username" type="text" id="username" class="form-control" aria-describedby="username">
                  </div>
              </div>
              <div class="row g-1 align-items-center">
                <div class="col-10  col-md-10 col-lg-10">
                    <label for="inputPassword6" class="col-form-label">Password</label>
                  </div>
                  <div class="col-10  col-md-10 col-lg-10" style="width: 250px;">
                    <input name="password" type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                  </div>
              </div>
              <div class="row g-2 align-items-center">
                <div class="col-10  col-md-10 col-lg-10 ">
                    <button type="submit" class="btn  btn-outline-primary" name="Validate">Connexion</button>
                </div>
              </div>
        </form>
    </div>

    <!-- Footer -->
    <?php  include('footer.php'); ?>
</body>
</html>
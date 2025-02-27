<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LsBook</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
     <!--Poshyk-->
      <nav class="navbar navbar-expand-lg  navbar-light bg-white py-3 fixed-top">
        <div class="container">
          <img class="logo" src="assets/imgs/logo.png">
          <h2 class="brand">LsBook</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                <a class="nav-link" href="index.php">Головна</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Магазин</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Блог</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Контакти</a>
              </li>


              <li class="nav-item">
                <a href="cart.php">
                  <i class="fa-solid fa-book-journal-whills">
                  <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0 ) { ?>
                    <span class="cart-quantity"> <?php echo $_SESSION['quantity']; ?></span>

                    <?php } ?>
                </i></a>
                <a href="account.php"><i class="fas fa-user"></i></a>
              </li>

            </ul>
            
          </div>
        </div>
      </nav>
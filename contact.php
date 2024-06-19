<?php

session_start();

?>

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
              <a class="nav-link" href="https://www.instagram.com/ofy.v.ls/">Блог</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Контакти</a>
            </li>


            <li class="nav-item">
            <a href="cart.php">
                  <i class="fa-solid fa-book-journal-whills">
                  <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0 ) { ?>
                    <span style="font-size: 18px;"> <?php echo $_SESSION['quantity']; ?></span>

                    <?php } ?>
                </i></a>
              <a href="account.php"><i class="fas fa-user"></i></a>
            </li>

          </ul>
          
        </div>
      </div>
    </nav>





      <!--Contact-->
      <section id="contact" class="container my-5 py-5">
        <div class="container text-center mt-5">
            <h3>Зв'яжіться з нами</h3>
            <hr class="mx-auto">
            <p class="w-50 mx-auto">
                Телефон: <span>+(380)-98-797-10-54</span>
            </p>
            <p class="w-50 mx-auto">
                Пошта: <span>lonskiy131@gmail.com</span>
            </p>
            <p class="w-50 mx-auto">
                Ми надаємо допомогу 24/7 на ваші питання
            </p>
        </div>
      </section>









        <!--Pidval-->
        <footer class="mt-5 py-5">
            <div class="row container mx-auto pt-5">
              <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo" src="assets/imgs/logo.png">
                <p class="pt-3">Ми пропонуємо найкращі книги за найдоступнішими цінами</p>
              </div>
              <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pd-2">Рекомендовані</h5>
                <ul class="text-uppercase">
                  <li><a href="#">Книги для чоловіків</a></li>
                  <li><a href="#">Книги для жінок</a></li>
                  <li><a href="#">Книги для дівчат</a></li>
                  <li><a href="#">Книги для хлопців</a></li>
                  <li><a href="#">Книги для дітей</a></li>
                </ul>
              </div>
    
              <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Контакти</h5>
                <div>
                  <h6 class="text-uppercase">Адреса</h6>
                  <p>Україна, м.Житомир, вул. Чуднівська, 103</p>
                </div>
                <div>
                  <h6 class="text-uppercase">Телефон</h6>
                  <p>(+380)987971054</p>
                </div>
                <div>
                  <h6 class="text-uppercase">Пошта</h6>
                  <p>lonskiy131@gmail.com</p>
                </div>
    
              </div>
              <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                  <img src="assets/imgs/Books/221_1_15.jpg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/Books/1.jpg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/Books/nathiolizm1.jpeg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/Books/4.jpg" class="img-fluid w-25 h-100 m-2"/>
                  <img src="assets/imgs/Books/Ukraine1.jpg" class="img-fluid w-25 h-100 m-2"/>
                </div>
              </div>
            </div>
    
    
    
    
            <div class="copyright mt-5">
              <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                  <img src="assets/imgs/payment.png">
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                  <p>"Дипломна робота" </p>
                  <p>студента ЗІПЗк 21-1 Лонського. В. </p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                  <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-x"></i></a>
                </div>
              </div>
            </div>
    
          </footer>
    
    
    
        <script src="https://kit.fontawesome.com/723c018c14.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
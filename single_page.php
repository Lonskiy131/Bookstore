<?php 
session_start();
include('server/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt-> bind_param("i",$product_id);

  $stmt->execute();
  
  
  
  $product = $stmt->get_result();

  
}else{

  header('location: index.php');
}


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
                    <span class="cart-quantity"> <?php echo $_SESSION['quantity']; ?></span>
                    <?php } ?>

                </i></a>
              <a href="account.php"><i class="fas fa-user"></i></a>
            </li>

          </ul>
          
        </div>
      </div>
    </nav>



          

      <!--One page-->
      <section class="container single-page my-5 pt-5">
        <div class="row mt-5">

          <?php while($row = $product->fetch_assoc()){?>

            


            
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/Books/<?php echo $row['product_image'];?>" id="mainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/Books/<?php echo $row['product_image'];?>"   class="small-img"> 
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/Books/<?php echo $row['product_image2'];?>"  class="small-img"> 
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/Books/<?php echo $row['product_image3'];?>" class="small-img"> 
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/Books/<?php echo $row['product_image4'];?>"  class="small-img"> 
                    </div>
                </div>
            </div>

            

            


            <div class="col-lg-6 col-md-12 col-12">
              <h6>Чоловічи/Книги</h6>
              <h3 class="py-4"><?php echo $row['product_name'];?></h3>
              
              <h2><?php echo $row['product_price'];?>₴</h2>

            <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>"/>
            <input type="hidden" name="product_image" value="<?php echo $row['product_image'];?>"/>
            <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>"/>
            <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>"/>

              <input type="number" name="product_quantity" value="1">
              <button class="buy-btn" type="subnit" name="add_to_cart">Добавити в корзину</button>
              </form>

              
              <h4 class="mt-5 mb-5">Деталі про книгу</h4>
              <span><?php echo $row['product_description'];?>
              </span>
            </div>

            
            <?php } ?>
        </div>
      </section>


      <!--Pohozhi books-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Похожі книги</h3>
          <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">


        <?php include('server/get_featured_products.php'); ?>


        <?php while($row= $featured_products->fetch_assoc()){ ?>

        
          
            <!--1-->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/Books/<?php echo $row['product_image']; ?>">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>          
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?>₴</h4>
            <a href="<?php echo "single_page.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Купити зараз</button></a>
          </div>

          <!--2-->
    

          <!--3-->
       

           <!--4-->

           <?php } ?>
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
              <img src="assets/imgs/Books/Класика/1.jpg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/Books/Фентезі/фентезі2.jpg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/Books/Фентезі/4.jpg" class="img-fluid w-25 h-100 m-2"/>
              <img src="assets/imgs/Books/Фентезі/фентезі1.jpg" class="img-fluid w-25 h-100 m-2"/>
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
    
    <script>

      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img"); 

      for(let i=0; i<4; i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }

      }




    </script>

</body>
</html>
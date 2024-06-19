<?php 
session_start();
include('layouts/header.php'); ?>


      <!--GOLOVNA-->
      <section id="home">
        <div class="container">
          <h5>НОВІ КНИГИ</h5>
          <h1><span>Найкращі ціни</span> на книги</h1>
          <p>LsBook пропонує найкращі книги за найдоступнішою ціною </p>
          <a href="shop.php"><button>Купити зараз</button></a>
        </div>
      </section>

      <!--Brend-->
      <section id="brand" class="container">
        <div class="row">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.png"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.png"/>
        </div>
      </section>

      <!--NEw-->
      <section id="new" class="w-55">
        <div class="row p-0 m-0">
          <!--1-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/Books/221_1_15.jpg"/>
            <div class="details">
              <h2>Фентезі книги</h2>
              <a href="#fantastyk"> <button class="text-uppercase">Купити зараз</button></a>
            </div>
          </div>         
          <!--2-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/Books/img448_3_1.jpg"/>
            <div class="details">
              <h2>Бізнез книги</h2>
              <a href="#bisnes"><button class="text-uppercase">Купити зараз</button></a>
            </div>
          </div> 

          <!--3-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/Books/cover_198_21.png"/>
            <div class="details">
              <h2>Романтичні книги</h2>
             <a href="#romantic"> <button class="text-uppercase">Купити зараз</button></a>
            </div>
          </div> 
        </div>
      </section>

      <!--Recomendacii-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Рекомендації</h3>
          <hr class="mx-auto">
          <p>Тут можна перевірити рекомендовані книги</p>
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


      <!--Baner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>Cезонні книги</h4>
          <h1>Весняна колекція <br>Знижки до 30% </h1>
          <a href="shop.php"><button class="text-uppercase">Купити зараз</button></a>
        </div>
      </section>
    
      <!--Classick-->
      <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5">
          <h3>Класика</h3>
          <hr class="mx-auto">
          <p>Тут можна перевірити популярні класичні книги</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_classick.php') ?>

        <?php  while($row=$classick_products->fetch_assoc()){?>
          
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
            <a href="<?php echo "single_page.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Купити зараз</button></a>
          </div>

          <!--2-->
         

          <!--3-->
          

           <!--4-->

         
           <?php } ?>
        </div>
      </section>

      <!--Fantastyk-->
      <section id="fantastyk" class="my-5 ">
        <div id="fantastyk" class="container text-center mt-5 py-5">
          <h3>Фантастика</h3>
          <hr class="mx-auto">
          <p>Тут можна перевірити популярну фантастику</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_fantastyk.php'); ?>
        <?php while($row=$fantastyk->fetch_assoc()){ ?>

        
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <!--1-->
            <img class="img-fluid mb-3" src="assets/imgs/Books/<?php echo $row['product_image']; ?>">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>          
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_page.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Купити зараз</button></a>
          </div>

          <?php } ?>

        </div>
      </section>

      <!--Romantic-->
      <section id="romantic" class="my-5 ">
      <div class="container text-center mt-5 py-5">
          <h3>Романтика</h3>
          <hr class="mx-auto">
          <p>Тут можна перевірити популярні романтичні книги</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_romantick.php'); ?>
        <?php while($row=$romantick->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <!--1-->
            <img class="img-fluid mb-3" src="assets/imgs/Books/<?php echo $row['product_image']; ?>">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>          
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_page.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Купити зараз</button></a>
          </div>
          <?php } ?>

        </div>
      </section>

       <!--Bisnes-->
       <section id="bisnes" class="my-5 ">
      <div class="container text-center mt-5 py-5">
          <h3>Книги по бізнесу</h3>
          <hr class="mx-auto">
          <p>Тут можна перевірити популярні бізнес книги</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_bisnes.php'); ?>
        <?php while($row=$bisnes->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <!--1-->
            <img class="img-fluid mb-3" src="assets/imgs/Books/<?php echo $row['product_image']; ?>">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>          
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_page.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Купити зараз</button></a>
          </div>
          <?php } ?>

        </div>
      </section>

      <?php include('layouts/footer.php'); ?>



<?php 

session_start();

include('server/connection.php');


if(isset($_POST['search'])){

  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
  }else{
    $page_no = 1;
  }


  

  $category = $_POST['category'];
  $price = $_POST['price'];
  

  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?");
  $stmt1->bind_param('si', $category,$price);
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();


  $total_records_per_page = 8;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_gape = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);






  $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");

  $stmt->bind_param("si", $category,$price);

$stmt->execute();


$products = $stmt->get_result();

}else{

  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
  }else{
    $page_no = 1;
  }


  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();


  $total_records_per_page = 8;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_gape = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2";

  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
  $stmt2->execute();
  $products = $stmt2->get_result();

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .product img{
            width: 65% ;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        .pagination a{
          color:rgb(29, 89, 179) ;

        }

        .pagination li:hover a{
          color: white;
          background-color: rgb(29, 89, 179) ;

        }
        #shop .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        }

       
    </style>
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


<section id="shop" class="my-5 py-5">
    <div class="container text-center mt-5 py-5">
        <h3>Каталог книг</h3>
        <hr class="mx-auto">
        <p>Тут можна перевірити каталог різних жанрів</p>
    </div>

    <div class="row container">
        <!-- Пошук книг -->
        <div class="col-lg-3 col-md-4 col-sm-12">
            <section id="search" class="ms-2">
                <div class="container">
                    <p>Пошук книг</p>
                    <hr>
                </div>
                <form action="shop.php" method="POST">
                    <div class="row mx-auto container">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p>Жанри</p>
                            <div class="form-check">
                                <input class="form-check-input" value="Бізнес" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='Бізнес'){echo 'checked';} ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Бізнес
                                </label>
                            </div>
                                <div class="form-check">
                                <input class="form-check-input" value="Історичні" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='Історичні'){echo 'checked';} ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Історичні
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Класика" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='Класика'){echo 'checked';} ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Класика
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Фентезі" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='Фентезі'){echo 'checked';} ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Фентезі
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Романтика" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='Романтика'){echo 'checked';} ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Романтика
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Детектив" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='Детектив'){echo 'checked';} ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Детектив
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto container mt-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p>Ціна</p>
                            <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{echo "10"; } ?>" min="1" max="2500" id="customRange2">
                            <div class="w-50">
                                <span style="float: left;">1</span>
                                <span style="float: right;">2500</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-3 mx-3">
                        <input type="submit" name="search" value="Пошук" class="btn btn-primary">
                    </div>
                </form>
            </section>
        </div>

        <!-- Products -->
        <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row mx-auto container">

            <?php while($row = $products->fetch_assoc()) { ?>
    <!-- Books -->
    <div onclick="window.location.href='single_page.php?product_id=<?php echo $row['product_id']; ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/Books/<?php echo $row['product_image']; ?>"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        <p class="p-price"><?php echo $row['product_price']; ?>₴</p>
        <a class="btn shop-buy-btn" href="<?php echo "single_page.php?product_id=".$row['product_id']; ?>">Купити зараз</a>
    </div>
<?php } ?>

    <nav aria-label="Page navigation example">
                <ul class="pagination mt-5">
                    <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?>">
                        <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{ echo "?page_no=".($page_no-1);} ?>">Попередній</a>
                      </li>



                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
                    <li class="page-item"><a class="page-link" href="?page_no=3">3</a></li>

                    <?php if($page_no >=4){ ?>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no; ?></a></li>
                    <?php } ?>

                    <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';}?>">
                    <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{ echo "?page_no=".($page_no+1);} ?>">Наступний</a></li>
                </ul>
  </nav>
  
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
          <img src="assets/imgs/Books/Cherchil1.jpg" class="img-fluid w-25 h-100 m-2"/>
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
<script>
    window.addEventListener('load', function() {
        
        var firstImage = document.querySelector('.product img');


        var firstImageWidth = firstImage.offsetWidth;
        var firstImageHeight = firstImage.offsetHeight;

        var images = document.querySelectorAll('.product img');
        images.forEach(function(img) {
            img.style.width = firstImageWidth + 'px';
            img.style.height = firstImageHeight + 'px';
        });
    });
</script>
</html>
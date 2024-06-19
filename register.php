<?php 

session_start();

include('server/connection.php');


if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if($password !== $confirmPassword){
    header('location: register.php?error=Паролі не збігаються');
  

  }else if(strlen($password) < 6){
    header('location: register.php?error=Пароль має бути не менше 6 символів');
  

  }else{

                $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
                $stmt1->bind_param('s',$email);
                $stmt1->execute();
                $stmt1->bind_result($num_rows);
                $stmt1->store_result();
                $stmt1->fetch();


                if($num_rows !=0){
                  header('location: register.php?error=Ця електронна адреса вже існує');
                }else{


                        $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                                        VALUES (?,?,?)");

                        $stmt->bind_param('sss',$name,$email,md5($password));



                        if($stmt->execute()){

                          $user_id = $stmt->insert_id;
                          $_SESSION['user_id'] = $user_id;
                          $_SESSION['user_email'] = $email;
                          $_SESSION['user_name'] = $name;
                          $_SESSION['logged_in'] = true;
                          header('location: account.php?register_success=Ви успішно зареєструвалися');

                        }else{

                          header('location:register.php?error=На даний момент не вдалося створити обліковий запис');

                        }
                }

              }
}

?>



<?php include('layouts/header.php'); ?>



      <!--Register-->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
          <h2 class="form-weight-bold">Регістрація</h2>
          <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
          <form id="register-form" method="POST" action="register.php">
            <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
            <div class="form-group">
              <label>Ім'я</label>
              <input type="text" class="form-control" id="register-email" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <label>Пошта</label>
              <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>Пароль</label>
              <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label>Підтвердьте пароль</label>
                <input type="password" class="form-control" id="register-cinfirm-password" name="confirmPassword" placeholder="Confirm Password" required>
              </div>
                <div class="form-group">
                  <input type="submit" class="btn" id="register-btn" name="register" value="Зареєструватися"/>
                </div>
                <div class="form-group">
                  <a id="login-url" href="login.php" class="btn">У вас є обліковий запис? Увійти</a>
                </div>
          </form>
        </div>
      </section>




      <?php include('layouts/footer.php'); ?>
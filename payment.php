<?php

session_start();

if(isset($_POST['order_pay_btn']) ){
  $order_status = $_POST['order_status'];
  $order_total_price = $_POST['order_total_price'];
}

?>

<?php include('layouts/header.php'); ?>

<!--Pay-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Оплата</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-center">


  <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "Не оплачено"){ ?>
      <?php $amount = strval($_POST['order_total_price']); ?>
      <?php $order_id = $_POST['order_id']; ?>
      
      <p>Загальна оплата: <?php echo $_POST['order_total_price'];?>₴</p>
      <!-- <input class="btn btn-primary" type="submit" value="Заплатити"/> -->
      <div class="paypal-button-wrapper">
      <div id="paypal-button-container"></div>

    <?php  } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0){?>
      <?php $amount = strval($_SESSION['total']); ?>
      <?php $order_id = $_SESSION['order_id']; ?>
      <p>Загальна оплата: <?php echo $_SESSION['total'];?>₴</p>
      <!-- <input class="btn btn-primary" type="submit" value="Заплатити"/> -->
      <div class="paypal-button-wrapper">
      <div id="paypal-button-container"></div>
     </div>


     </div>
      
    <?php } else {  ?>
      <p>У вас немає замовлення</p>
    <?php } ?>

   

  </div>
</section>



<script src="https://www.paypal.com/sdk/js?client-id=AWGpI-r7p0MaJ_uGDCiK1t_0M-V_hbWTyGRd4DuuFH6O3TqCy2ifFug-cn_xiVKEWVCQKs0_l8-hXEIQ&currency=USD"></script>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $amount ?>' 
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(orderData) {
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        var transaction = orderData.purchase_units[0].payments.captures[0];
        alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

        window.location.href = "server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?php echo $order_id ?>;
      });
    }
  }).render('#paypal-button-container');
</script>

<?php include('layouts/footer.php'); ?>

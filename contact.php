<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  if ($_SESSION['insert_formpayment'] == 'success') {
    echo '
      <script>
        swal("แจ้งชำระเงินเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_formpayment'] = null;
  }
?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9 text-center" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px;">

      <div class="col-md-12 text-center">
        <h2>ติดต่อเรา</h2>
      </div>

      <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1iXw5dGFaQkLv6cmKo72E317or9Y" width="640" height="480"></iframe>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

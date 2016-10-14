<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9">

      <div class="panel panel-warning" style="margin-top: 10px;">
        <div class="panel-heading">
          <h4>วิธีการสั่งซื้อสินค้า</h4>
        </div>
        <div class="panel-body">

          <div class="col-md-12" style="margin-bottom: 40px;">
            <div class="col-md-4">
              <img src="template/images/icon/how2order_1.png" class="img-responsive" alt="" style="margin-bottom: 10px;">
              เลือกสินค้าที่คุณต้องการ<br>โดยคลิกปุ่มสั่งซื้อ / หยิบลงตะกร้า
            </div>
            <div class="col-md-4">
              <img src="template/images/icon/how2order_2.png" class="img-responsive" alt="" style="margin-bottom: 10px;">
              เมื่อเลือกสินค้าครบแล้ว<br>ให้คลิกปุ่มสั่งซื้อสินค้าในตะกร้าสินค้า
            </div>
            <div class="col-md-4">
              <img src="template/images/icon/how2order_3.png" class="img-responsive" alt="" style="margin-bottom: 10px;">
              กรอกรายละเอียดให้ครบถ้วน<br>จากนั้นคลิกปุ่มยืนยันการสั่งซื้อ
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-4">
              <img src="template/images/icon/how2order_4.png" class="img-responsive" alt="" style="margin-bottom: 10px;">
              ชำระค่าสินค้าและบริการ<br>สามารถดู <a href="payment.php">วิธีการชำระเงินได้ที่นี่</a>
            </div>
            <div class="col-md-4">
              <img src="template/images/icon/how2order_5.png" class="img-responsive" alt="" style="margin-bottom: 10px;">
              แจ้งการชำระเงินผ่านทางหน้าเว็บไซต์ <a href="#">แจ้งชำระเงิน</a>
            </div>
            <div class="col-md-4">
              <img src="template/images/icon/how2order_6.png" class="img-responsive" alt="" style="margin-bottom: 10px;">
              เมื่อทางร้านตรวจสอบรายการชำระเงินเรียบร้อยแล้ว จะจัดส่งสินค้าให้คุณทันที
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

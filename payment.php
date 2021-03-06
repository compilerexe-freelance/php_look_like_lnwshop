<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  if ($_SESSION['insert_order'] == 'success') {
    echo '
      <script>
        swal("สั่งซื้อสินค้าเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_order'] = null;
    $_SESSION['data_cart'] = null;
    $_SESSION['array_code_item'] = null;
  }
?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px; padding-bottom: 100px;">

      <div class="col-md-12 text-center">
        <h2>วิธีการชำระเงิน</h2>
      </div>

      <div class="col-md-12" style="margin-top: 30px;">

        <!-- <span style="font-size: 20px;">วิธีการชำระเงิน</span><br><br> -->

        <span style="font-size: 16px;">
          วิธีที่ 1 เลือกซื้อสินค้าที่มีอยู่ในเว็บไซต์<br>
          -	สามารถสั่งซื้อสินค้าในเว็บแล้วทำตามขั้นตอน<br>
          -	เมื่อลูกค้าได้ทำการชำระค่าสินค้าแล้วกรุณายืนยันการชำระค่าสินค้าตามขั้นตอนในหน้า แจ้งชำระเงิน ทางแอดมินจะแจ้งยืนยันการชำระและส่งสินค้าให้ภายใน 3 วัน<br><br>
          วิธีที่ 2 การสั่งซื้อสินค้าที่นอกเหนือจากทางเว็บไซต์<br>
          -	ช่องทางการติดต่อ<br>
          1. หน้าเว็บบอร์ด (ตามที่พี่เขียนให้หนู)<br>
          2. เบอร์โทร (ตามที่พี่เขียนไว้ครั้งแรก)<br><br>

          แจ้งรายละเอียดสินค้าที่ลูกค้าต้องการ<br>
          	1. สินค้าที่ต้องการ เช่น ลูกปืน กรองน้ำมันเครื่อง เฟืองเกียร์ และอื่นๆ<br>
                   2. ช่องทางการติดต่อกับ เบอร์โทร ETC<br><br>

          - แอดมินจะแจ้งรายละเอียดราคาสินค้าพร้อมค่าขนส่งผ่านทาง เว็บบอร์ด (ภายใน 3 วัน)<br>
          - เมื่อลูกค้าได้ทำการชำระค่าสินค้าแล้ว ทางแอดมินจะแจ้งยืนยันการชำระเงินและส่งสินค้าให้ (ภายใน 3 วัน)<br><br>

          <span style="color: red;">หมายเหตุ : หากลูกค้าท่านใด ต้องการทราบเลขพัสดุ เพื่อนำไปตรวจสอบ ให้ลูกค้าเข้าไปดูในเว็บบอร์ด ทางร้านจะนำไปโพสให้ลูกค้าตรวจสอบค่ะ ลูกค้าจำหมายเลขใบสั่งซื้อด้วยนะค่ะ</span>
        </span>

      </div>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

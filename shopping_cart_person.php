<?php
  session_start();
  include('template/header.php');

  $_SESSION['data_cart'] = $_POST;
  //
  // print_r($_SESSION['data_cart']);

?>

<style>
  .table {
    border-bottom:0px !important;
  }
  .table th, .table td {
    border: 1px !important;
    background-color: #ffffe6;
  }
</style>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px;">

      <form action="shopping_cart_confirm.php" method="post">

        <div class="col-md-12" style="margin-top: 30px;">
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>กรอกข้อมูลผู้สั่งซื้อสินค้า</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>ชื่อ-นามสกุล</td>
                <td><input type="text" class="form-control" name="name" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>ที่อยู่</td>
                <td><input type="text" class="form-control" name="address" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>ตำบล</td>
                <td><input type="text" class="form-control" name="sub_district" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>อำเภอ</td>
                <td><input type="text" class="form-control" name="district" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>จังหวัด</td>
                <td><input type="text" class="form-control" name="province" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>ไปรษณีย์</td>
                <td><input type="text" class="form-control" name="postal_code" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>เบอร์โทร</td>
                <td><input type="text" class="form-control" name="tel" value="" required></td>
                <td>*</td>
              </tr>
              <tr>
                <td>อีเมล</td>
                <td><input type="text" class="form-control" name="email" value="" required></td>
                <td>(ถ้ามี)</td>
              </tr>
              <tr>
                <td></td>
                <td><a href="shopping_cart_detail.php"><button type="button" class="btn btn-success pull-left" style="width: 150px;"><< ย้อนกลับ</button></a><button type="submit" class="btn btn-success pull-right" style="width: 150px;">ยืนยัน >></button></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>

      </form>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

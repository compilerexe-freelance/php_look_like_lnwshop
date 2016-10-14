<?php
  session_start();
  include('header.php');

  if ($_SESSION['edit_item'] == 'success') {
    echo '
      <script>
        swal("แก้ไขสินค้าเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['edit_item'] = null;
  }
?>

<style>
  .table {
    background-color: #fff;
  }
  .table th, .table td {
    background-color: #fff;
  }
</style>

<div class="row">

  <div class="col-md-12">

    <?php include('menu.php'); ?>

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc; padding-bottom: 50px;">

      <!-- <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="item_add.php" style="margin-right: 10px;">เพิ่มสินค้า</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="item_edit.php" style="margin-right: 10px;">แก้ไขสินค้า</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="item_delete.php" style="margin-right: 10px;">ลบ</a>
        <hr size="1">
      </div> -->

      <div class="col-md-12 text-center">
        <h3><b>รายการสั่งซื้อ</b></h3>
      </div>

      <form action="process/insert_item.php" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>เลขที่ใบสั่งซื้อ</th>
              <th>รหัสสินค้า</th>
              <th>ชื่อสินค้า</th>
              <th>จำนวน</th>
              <th>ราคา</th>
              <th>การจัดส่ง</th>
              <th>วัน / เวลา ที่สั่งซื้อสินค้า</th>
            </tr>
          </thead>
          <tbody>

            <?php

              $sql = "SELECT * FROM tb_order";
              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

                $text_option = null;

                if ($row['option_send'] == '0') {
                  $text_option = 'ฟรี';
                } else if ($row['option_send'] == '1') {
                  $text_option = 'ในเมือง';
                } else {
                  $text_option = 'นอกเมือง';
                }

                echo '
                  <tr>
                    <td>'. $row['number_order'] .'</td>
                    <td>'. $row['code_item'] .'</td>
                    <td>'. $row['title_item'] .'</td>
                    <td>'. $row['count_order'] .'</td>
                    <td>'. $row['price_order'] .'</td>
                    <td>'. $text_option .'</td>
                    <td>'. $row['created_at'] .'</td>
                  </tr>
                ';
              }

            ?>

          </tbody>
        </table>

      </form>

    </div>
  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>

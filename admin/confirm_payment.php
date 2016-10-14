<?php
  session_start();
  include('header.php');

  if ($_SESSION['update_payment'] == 'success') {
    echo '
      <script>
        swal("อนุมัติเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['update_payment'] = null;
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

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc; padding-bottom: 200px;">

      <div class="col-md-12 text-center">
        <h3><b>ตรวจสอบการชำระเงิน</b></h3>
      </div>

      <form action="process/insert_item.php" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>เลขที่ใบสั่งซื้อ</th>
              <th>ราคา</th>
              <th>รูปภาพ</th>
              <th>ธนาคาร</th>
              <th>เวลา</th>
              <th>วันที่</th>
              <th>สถานะ</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php

              $sql = "SELECT * FROM tb_formpayment";
              $result = mysqli_query($conn, $sql);
              $id_not_confirm = 0;

              while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

                $state = null;
                $number_order = $row['number_order'];
                $sql2 = "SELECT * FROM tb_payment WHERE number_order = $number_order";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {
                  if ($row2['status'] == 0) {
                    $state = 'ค้างชำระ';
                    $id_not_confirm = $row2['id'];
                  } else {
                    $state = 'ชำระแล้ว';
                  }
                }

                echo '
                  <tr>
                    <td>'. $row['number_order'] .'</td>
                    <td>'. $row['price'] .'</td>
                    <td><a href="../process/uploads/'. $row['picture'] .'" target="_blank">ดูรูปภาพ</a></td>
                    <td>'. $row['bank'] .'</td>
                    <td>'. $row['hour'] .':'. $row['minute'] .'</td>
                    <td>'. $row['payment_date'] .'</td>
                    <td>'. $state .'</td>
                ';

                if ($state == 'ค้างชำระ') {
                  echo '<td><a href="process/update_payment.php?id='. $id_not_confirm .'">อนุมัติ</a></td>';
                } else {
                  echo '<td></td>';
                }

                echo '
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

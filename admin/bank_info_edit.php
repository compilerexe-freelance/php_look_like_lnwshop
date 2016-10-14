<?php
  session_start();
  include('header.php');

  if ($_SESSION['update_bank'] == 'success') {
    echo '
      <script>
        swal("แก้ไขบัญชีธนาคารเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['update_bank'] = null;
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

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="bank_info.php" style="margin-right: 10px;">เพิ่มบัญชีธนาคาร</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="bank_info_edit.php" style="margin-right: 10px;">แก้ไขบัญชีธนาคาร</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="bank_info_delete.php" style="margin-right: 10px;">ลบบัญชีธนาคาร</a>
        <hr size="1">
      </div>

      <div class="col-md-12 text-center">
        <h3><b>แก้บัญชีธนาคาร</b></h3>
      </div>

      <form action="process/insert_item.php" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ชื่อธนาคาร</th>
              <th>ชื่อบัญชี</th>
              <th>เลขที่บัญชี</th>
              <th>สาขา</th>
              <th>เบอร์</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php

              $sql = "SELECT * FROM tb_infobank";
              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                echo '
                  <tr>
                    <td>'. $row['title_bank'] .'</td>
                    <td>'. $row['name'] .'</td>
                    <td>'. $row['number_bank'] .'</td>
                    <td>'. $row['brach_bank'] .'</td>
                    <td>'. $row['tel'] .'</td>
                    <td><a href="bank_info_edit_form.php?id='. $row['id'] .'">แก้ไข</a></td>
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

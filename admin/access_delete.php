<?php
  session_start();
  include('header.php');

  if ($_SESSION['delete_admin'] == 'success') {
    echo '
      <script>
        swal("ลบผู้ดูแลระบบเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['delete_admin'] = null;
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

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc; padding-bottom: 150px;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="access.php" style="margin-right: 10px;">เพิ่มผู้ดูแลระบบ</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="access_edit.php" style="margin-right: 10px;">แก้ไขผู้ดูแลระบบ</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="access_delete.php" style="margin-right: 10px;">ลบผู้ดูแลระบบ</a>
        <hr size="1">
      </div>

      <div class="col-md-12 text-center">
        <h3><b>ลบผู้ดูแลระบบ</b></h3>
      </div>

      <form action="process/insert_item.php" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Username</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php

              $sql = "SELECT * FROM tb_user";
              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                echo '
                  <tr>
                    <td>'. $row['username'] .'</td>
                    <td><a href="process/delete_admin.php?id='. $row['id'] .'">ลบ</a></td>
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

<?php
  session_start();
  include('db_config.php');
  include('header.php');

  if ($_SESSION['delete_topic'] == 'success') {
    echo '
      <script>
        swal("ลบกระทู้เรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['delete_topic'] = null;
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

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px; padding-bottom: 100px;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="create_topic.php" style="margin-right: 10px;">เพิ่มกระทู้</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="edit_topic.php" style="margin-right: 10px;">แก้ไขกระทู้</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="delete_topic.php" style="margin-right: 10px;">ลบกระทู้</a>
        <hr size="1">
      </div>

      <div class="col-md-12 text-center">
        <h2>ลบกระทู้</h2>
      </div>

      <div class="col-md-12" style="margin-top: 30px;">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>หัวข้อ</th>
              <th>โดย</th>
              <th>โพสต์ล่าสุด</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM tb_webboard";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                echo '
                  <tr>
                    <td>'.$row['topic'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td><a href="process/delete_topic.php?id='.$row['id'].'">ลบ</a></td>
                  </tr>
                ';
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>

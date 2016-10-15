<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  if ($_SESSION['insert_topic'] == 'success') {
    echo '
      <script>
        swal("ตั้งกระทู้เรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_topic'] = null;
  }
?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px; padding-bottom: 100px;">

      <div class="col-md-12 text-center">
        <h2>เว็บบอร์ด</h2>
      </div>

      <!-- <div class="col-md-12 text-right">
        <a href="create_topic.php"><button type="button" class="btn btn-success">ตั้งกระทู้ใหม่</button></a>
      </div> -->

      <div class="col-md-12" style="margin-top: 30px;">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>หัวข้อ</th>
              <th>โดย</th>
              <th>โพสต์ล่าสุด</th>
              <!-- <th></th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM tb_webboard";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                echo '
                  <tr>
                    <td><a href="view_topic.php?id='.$row['id'].'">'.$row['topic'].'</a></td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['created_at'].'</td>

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

<?php include('template/footer.php'); ?>

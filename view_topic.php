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
  }

  $id = $_GET['id'];
  $topic = null;
  $name = null;
  $email = null;
  $detail = null;

  $sql = "SELECT * FROM tb_webboard WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $topic    = $row['topic'];
    $name     = $row['name'];
    $email    = $row['email'];
    $detail   = $row['detail'];
  }
?>

<style>
  .table {
    border-bottom:0px !important;
    background-color: #ffffe6;
  }
  .table th, .table td {
    border: 1px !important;
    background-color: #ffffe6;
  }
</style>

<script>tinymce.init({ selector:'textarea' });</script>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px; padding-bottom: 100px;">

      <div class="col-md-12 text-center">
        <h2>การจัดการกระทู้</h2>
      </div>

      <div class="col-md-12" style="margin-top: 30px;">

          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td><b>หัวข้อ</b></td>
                <td><input type="text" name="topic" class="form-control" value="<?php echo $topic; ?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><b>ชื่อ</b></td>
                <td><input type="text" name="name" class="form-control" value="<?php echo $name; ?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><b>อีเมล</b></td>
                <td><input type="text" name="email" class="form-control" value="<?php echo $email; ?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><b>ข้อความ</b></td>
                <td><textarea name="detail" class="form-control" style="resize: none;" rows="8" cols="40"><?php echo $detail; ?></textarea></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

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
        <h2>ตั้งกระทู้ใหม่</h2>
      </div>

      <div class="col-md-12" style="margin-top: 30px;">

        <form action="process/insert_topic.php" method="post">

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
                <td><input type="text" name="topic" class="form-control" value=""></td>
                <td></td>
              </tr>
              <tr>
                <td><b>ชื่อ</b></td>
                <td><input type="text" name="name" class="form-control" value=""></td>
                <td></td>
              </tr>
              <tr>
                <td><b>อีเมล</b></td>
                <td><input type="text" name="email" class="form-control" value=""></td>
                <td></td>
              </tr>
              <tr>
                <td><b>ข้อความ</b></td>
                <td><textarea name="detail" class="form-control" style="resize: none;" rows="8" cols="40"></textarea></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td><button type="submit" class="btn btn-success" style="width: 150px;">บันทึก</button></td>
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

<?php
  session_start();
  include('db_config.php');
  include('header.php');

  if ($_SESSION['insert_topic'] == 'success') {
    echo '
      <script>
        swal("เพิ่มกระทู้เรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_topic'] = null;
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

    <?php include('menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px; padding-bottom: 100px;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="create_topic.php" style="margin-right: 10px;">เพิ่มกระทู้</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="edit_topic.php" style="margin-right: 10px;">แก้ไขกระทู้</a>
        <i class="glyphicon glyphicon-comment"></i> <a href="reply_topic.php" style="margin-right: 10px;">ตอบกระทู้</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="delete_topic.php" style="margin-right: 10px;">ลบกระทู้</a>
        <hr size="1">
      </div>

      <div class="col-md-12 text-center">
        <h2>แก้ไขกระทู้</h2>
      </div>

      <div class="col-md-12" style="margin-top: 30px;">

        <form action="process/update_topic.php" method="post">

          <input type="hidden" name="id" value="<?php echo $id; ?>">

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
              <input type="hidden" name="name" value="admin">
              <tr>
                <td><b>ข้อความ</b></td>
                <td><textarea name="detail" class="form-control" style="resize: none;" rows="8" cols="40"><?php echo $detail; ?></textarea></td>
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

<?php include('footer.php'); ?>

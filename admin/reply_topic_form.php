<?php
  session_start();
  include('db_config.php');
  include('header.php');

  if ($_SESSION['insert_reply'] == 'success') {
    echo '
      <script>
        swal("ตอบกระทู้เรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_reply'] = null;
  }

  if ($_SESSION['reply_fail_name'] == 'fail_name') {
    echo '
      <script>
        swal("กรุณาใช้ชื่ออื่น", "", "error")
      </script>
    ';
    $_SESSION['reply_fail_name'] = null;
  }

  $id = $_GET['id'];
  $topic = null;
  $name = null;
  $email = null;
  $detail = null;
  $picture = null;
  $created_at = null;

  $sql = "SELECT * FROM tb_webboard WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $topic    = $row['topic'];
    $name     = $row['name'];
    $email    = $row['email'];
    $detail   = $row['detail'];

    if ($row['picture'] != null) {
      $picture = $row['picture'];
    }

    $created_at = $row['created_at'];
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
        <h2>ตอบกระทู้</h2>
      </div>

      <div class="col-md-12" style="margin-top: 30px;">

          <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 22px;"><?php echo $topic; ?></div>
            <div class="panel-body">
                <?php
                  if ($picture != null) {
                    echo "<img src='process/uploads/". $picture ."' class='img-responsive'><br>";
                  }
                  echo $detail;
                ?>
            </div>
            <div class="panel-footer">
              โดย <?php echo $name . ' / โพสต์เมื่อ ' . $created_at; ?>
            </div>
          </div>

          <?php
            $sql = "SELECT name, detail, created_at FROM tb_reply WHERE topic_id = $id";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
              echo '
                <div class="panel panel-default">
                  <div class="panel-body">
                      '. $row['detail'] .'
                  </div>
                  <div class="panel-footer">
                    โดย '. $row['name'] .' / ตอบกลับเมื่อ '. $row['created_at'] .'
                  </div>
                </div>
              ';
            }
          ?>

          <hr>

          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <form action="process/reply.php" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="name" value="admin">
                <tr>
                  <td><b>ข้อความ</b></td>
                  <td><textarea name="detail" class="form-control" style="resize: none;" rows="8" cols="40"></textarea></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-success" style="width: 150px;">ตอบกระทู้</button></td>
                  <td></td>
                </tr>
              </form>
            </tbody>
          </table>
        </div>

    </div>

  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>

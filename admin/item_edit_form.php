<?php
  session_start();
  include('db_config.php');
  include('header.php');

  if ($_SESSION['insert_item'] == 'success') {
    echo '
      <script>
        swal("เพิ่มสินค้าเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_item'] = null;
  }

  $item_id = $_GET['id'];
  $code_item = null;
  $title_item = null;
  $price_item = null;
  $detail_item = null;

  $sql = "SELECT * FROM tb_item WHERE id = $item_id";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $item_id      = $row['code_item'];
    $title_item   = $row['title_item'];
    $price_item   = $row['price_item'];
    $detail_item  = $row['detail_item'];
  }

?>

<style>
  .table {
    border-bottom:0px !important;
  }
  .table th, .table td {
    border: 1px !important;
  }
</style>

<div class="row">

  <div class="col-md-12">

    <?php include('menu.php'); ?>

    <div class="col-md-9" style="margin-top: 20px; background-color: #ffffe6; border: 1px solid #abc;">

      <div class="col-md-12" style="margin-top: 20px;">
        <i class="glyphicon glyphicon-plus"></i> <a href="item_add.php" style="margin-right: 10px;">เพิ่มสินค้า</a>
        <i class="glyphicon glyphicon-pencil"></i> <a href="item_edit.php" style="margin-right: 10px;">แก้ไขสินค้า</a>
        <i class="glyphicon glyphicon-trash"></i> <a href="item_delete.php" style="margin-right: 10px;">ลบสินค้า</a>
        <hr size="1">
      </div>

      <div class="col-md-12 text-center">
        <h3><b>แก้ไขสินค้า</b></h3>
      </div>

      <form action="process/edit_item.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
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
              <td>รหัสสินค้า</td>
              <td><input type="text" name="code_item" id="code_item" class="form-control" value="<?php echo $item_id; ?>" required></td>
              <td></td>
            </tr>
            <tr>
              <td>ชื่อสินค้า</td>
              <td><input type="text" name="title_item" id="title_item" class="form-control" value="<?php echo $title_item; ?>" required></td>
              <td></td>
            </tr>
            <tr>
              <td>รูปสินค้า</td>
              <td><input type="file" name="fileUpload"></td>
              <td></td>
            </tr>
            <tr>
              <td>ราคา (บาท)</td>
              <td><input type="text" name="price_item" id="price_item" class="form-control" value="<?php echo $price_item; ?>" required></td>
              <td></td>
            </tr>
            <tr>
              <td>รายละเอียดสินค้า</td>
              <td><textarea name="detail_item" id="detail_item" class="form-control" style="resize: none;" rows="8" cols="40"><?php echo $detail_item; ?></textarea></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td><button type="submit" class="btn btn-success" style="width: 150px;" id="btn_confirm">ยืนยัน</button></td>
              <td></td>
            </tr>
          </tbody>
        </table>

      </form>

    </div>
  </div>

</div> <!-- end row -->

<?php include('footer.php'); ?>

<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  // print_r($_SESSION['array_code_item']);
?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 10px; padding-bottom: 90px;">

      <form action="shopping_cart_detail.php" method="post">

        <input type="hidden" name="code_item" value="<?php echo $_GET['code_item']; ?>">

        <?php
          $code_item = $_GET['code_item'];
          $sql = "SELECT code_item, title_item, detail_item, picture FROM tb_item";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            if ($row['code_item'] == $code_item) {
              echo '

                <div class="col-md-12">
                  <h2>'. $row['title_item'] .'</h2>
                </div>

                <div class="col-md-4" style="margin-top: 10px;">
                  <a href="#" class="thumbnail">
                    <img src="admin/process/uploads/'. $row['picture'] .'" alt="" style="background-color: #d9b38c; height: 150px; width: 100%;">
                  </a>
                </div>

                <div class="col-md-8">
                  <div class="panel panel-info" style="margin-top: 10px;">
                    <div class="panel-heading">
                      <span>รายละเอียดสินค้า</span>
                    </div>
                    <div class="panel-body">
                      '.$row['detail_item'].'
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-shopping-cart"></i> หยิบใส่ตะกร้า</button>
                </div>
              ';
            }
          }

          mysqli_free_result($result);
          mysqli_close($conn);
        ?>

        <!-- <div class="col-md-offset-1 col-md-3" style="margin-top: 30px;">
          <a href="#" class="thumbnail">
            <img src="" alt="" style="background-color: #d9b38c; height: 150px;" class="img-responsive">
          </a>
        </div>

        <div class="col-md-8">
          <div class="panel panel-info" style="margin-top: 30px;">
            <div class="panel-heading">
              <span>รายละเอียดสินค้า</span>
            </div>
            <div class="panel-body">

            </div>
          </div>
          <a href="shopping_cart_detail.php"><button type="button" class="btn btn-success pull-right"><i class="glyphicon glyphicon-shopping-cart"></i> หยิบใส่ตะกร้า</button></a>
        </div> -->

      </form>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

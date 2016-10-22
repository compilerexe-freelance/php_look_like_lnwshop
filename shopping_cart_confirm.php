
<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  // print_r($_SESSION['data_cart']);
  // echo '<br>';
  // print_r($_POST);

  $order_number = rand(1000000,9999999);

  $_SESSION['name']         = $_POST['name'];
  $_SESSION['address']      = $_POST['address'];
  $_SESSION['sub_district'] = $_POST['sub_district'];
  $_SESSION['district']     = $_POST['district'];
  $_SESSION['province']     = $_POST['province'];
  $_SESSION['postal_code']  = $_POST['postal_code'];
  $_SESSION['tel']          = $_POST['tel'];
  $_SESSION['email']        = $_POST['email'];

?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px; padding-bottom: 20px;">

      <form action="process/insert_order.php" method="post">

        <input type="hidden" name="order_number" value="<?php echo $order_number; ?>">

        <div class="col-md-12 text-center">
          <h2>รายละเอียดการซื้อสินค้า</h2>
        </div>
        <div class="col-md-12 text-left">
          <b>เลขที่ใบสั่งซื้อสินค้า <span><?php echo $order_number; ?></span></b>
        </div>

        <div class="col-md-12" style="margin-top: 30px;">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>รหัสสินค้า</th>
                <th>รายการ</th>
                <th>จำนวน</th>
                <th>ราคา</th>
                <th>ราคารวม</th>
              </tr>
            </thead>
            <tbody>

              <?php

                $total = 0;
                $option_send = 0;
                $price_send = 0;
                $result_price = 0;

                foreach ($_SESSION['data_cart'] as $key => $value) {
                  if ($key != 'option_send') {
                    // echo $key . '<br>';

                    echo '<tr>';
                    $sql = "SELECT * FROM tb_item WHERE code_item = $value";

                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

                      if ($row['code_item'] == $key && strlen($key) >= 4) {
                        echo '
                          <td>'. $value . '</td>
                          <td>'. $row['title_item'] .'</td>
                          <td>'. $_SESSION['data_cart']['send_count_'.$row['id']] .'</td>
                          <td>'. $row['price_item'] .'</td>
                          <td>'. $row['price_item'] * $_SESSION['data_cart']['send_count_'.$row['id']] .'</td>
                        ';

                        $total = $total + $row['price_item'] * $_SESSION['data_cart']['send_count_'.$row['id'] ];

                      }

                    }
                    echo '</tr>';

                  } else {
                    $option_send = $value;
                  }
                }

                if ($option_send == 1) {
                  $price_send = 150;
                } else if ($option_send == 2) {
                  $price_send = 200;
                } else {
                  $price_send = 0;
                }

                $result_price = $total + $price_send;

              ?>

              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>รวมค่าจัดส่ง</b></td>
                <td><?php echo $result_price ?></td>
              </tr>

            </tbody>
          </table>
        </div>

        <div class="col-md-6">
          <a href="shopping_cart_person.php"><button type="button" class="btn btn-success pull-left"><< ย้อนกลับ</button></a>
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-success pull-right">ยืนยันการสั่งซื้อ >></button>
        </div>

      </form>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

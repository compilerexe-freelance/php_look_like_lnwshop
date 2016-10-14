<?php
  session_start();
  date_default_timezone_set("Asia/Bangkok");
  include('../config/db_config.php');

  $total = 0;
  $option_send = 0;
  $price_send = 0;
  $result_price = 0;
  $number_order = $_POST['order_number'];
  echo $number_order . '<br>';

?>

<style>
  tr th {
    text-align: center;
  }
  tr td {
    text-align: center;
  }
</style>

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

      foreach ($_SESSION['data_cart'] as $key => $value) {
        if ($key != 'option_send') {
          // echo $value . '<br>';

          echo '<tr>';
          $sql = "SELECT * FROM tb_item WHERE code_item = $value";

          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

            if ($row['code_item'] == $key) {
              echo '
                <td>'. $value . '</td>
                <td>'. $row['title_item'] .'</td>
                <td>'. $_SESSION['data_cart']['count_'.$row['id']] .'</td>
                <td>'. $row['price_item'] .'</td>
                <td>'. $row['price_item'] * $_SESSION['data_cart']['count_'.$row['id']] .'</td>
              ';

              $total = $total + $row['price_item'] * $_SESSION['data_cart']['count_'.$row['id']];

              // insert order
              $title_item = $row["title_item"];
              $item_count = $_SESSION['data_cart']['count_'.$row['id']];
              $price_multiply = $row['price_item'] * $_SESSION['data_cart']['count_'.$row['id']];
              $date_now = date('Y-m-d h:i:s');

              $sql = "INSERT INTO tb_order (number_order, code_item, title_item, count_order, price_order, option_send, created_at)
              VALUES('$number_order', '$value', '$title_item', '$item_count', '$price_multiply', '$option_send', '$date_now')";

              if ($conn->query($sql) === TRUE) {

              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                  exit(0);
              }

              // end insert order

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

      // insert person
      $name         = $_SESSION['name'];
      $address      = $_SESSION['address'];
      $sub_district = $_SESSION['sub_district'];
      $district     = $_SESSION['district'];
      $province     = $_SESSION['province'];
      $postal_code  = $_SESSION['postal_code'];
      $tel          = $_SESSION['tel'];
      $email        = $_SESSION['email'];
      $date_now     = date('Y-m-d h:i:s');

      $sql = "INSERT INTO tb_person (number_order, name, address, sub_district, district, province, postal_code, tel, email, created_at)
      VALUES('$number_order', '$name', '$address', '$sub_district', '$district', '$province', '$postal_code', '$tel', '$email', '$date_now')";
      if ($conn->query($sql) === TRUE) {

      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          exit(0);
      }
      // end insert person

      // insert payment
      $sql = "INSERT INTO tb_payment (number_order, status) VALUES('$number_order', '0')";
      if ($conn->query($sql) === TRUE) {

      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          exit(0);
      }
      // end insert payment

      $_SESSION['insert_order'] = 'success';
      header( "location: http://localhost/shop/payment.php" );
      exit(0);

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

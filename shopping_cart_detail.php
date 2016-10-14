<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  if (count($_SESSION['array_code_item']) == 0) {
    array_push($_SESSION['array_code_item'], $_POST['code_item']);
  }

  $check_double = 0;
  foreach ($_SESSION['array_code_item'] as $add_code_item) {
    if ($add_code_item == $_POST['code_item']) {
      $check_double = 1;
    }
  }

  if ($check_double == 0) {
    array_push($_SESSION['array_code_item'], $_POST['code_item']);
  }

  // print_r($_SESSION['array_code_item']);

?>

<script>

  var total_price = 0;
  var total;
  var result_count_item = 0;

</script>

<script>

  var buffer_price_send = 0;

  $(document).ready(function() {

    $('input[type=radio][name=option_send]').on('change', function() {
      if ($(this).val() == '1') {

        total = parseInt($('#txt_result_price').text()) - buffer_price_send;
        total = total + 150;
        buffer_price_send = 150;
        $('#price_send').text(' ' + total + ' ');
        console.log(buffer_price_send);

      } else if ($(this).val() == '2') {

        total = parseInt($('#txt_result_price').text()) - buffer_price_send;
        total = total + 200;
        buffer_price_send = 200;
        $('#price_send').text(' ' + total + ' ');
        console.log(buffer_price_send);

      } else {

        $('#price_send').text(' ' + $('#txt_result_price').text() + ' ');
        buffer_price_send = 0;
        console.log(buffer_price_send);

      }
    });

  });

</script>

<style>
  .table {
    border-bottom:0px !important;
    background-color: #ffffe6;
  }
  .table th {

    background-color: #d9d9d9;
  }
  .table td {
    /*border: 1px !important;*/
    background-color: #ffffe6;
  }

</style>

<div class="row">

  <div class="col-md-12" style="margin-bottom: 50px;">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px;">


        <!-- <div class="col-md-3">
          <button class="btn btn-success" style="width: 100%; font-size: 16px; border-radius: 0px;">รายการสินค้า</button>
        </div>
        <div class="col-md-3">
          <button class="btn btn-success" style="width: 100%; font-size: 16px; border-radius: 0px;">ราคา/ชิ้น(บาท)</button>
        </div>
        <div class="col-md-3">
          <button class="btn btn-success" style="width: 100%; font-size: 16px; border-radius: 0px;">จำนวน (ชิ้น)</button>
        </div>
        <div class="col-md-3">
          <button class="btn btn-success" style="width: 100%; font-size: 16px; border-radius: 0px;">มูลค่ารวมค่าจัดส่ง(บาท)</button>
        </div> -->


      <form id="my_form" action="shopping_cart_person.php" method="post">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>สินค้า</th>
              <th>ราคา/ชิ้น</th>
              <th>จำนวน</th>
              <th>ราคารวม</th>
            </tr>
          </thead>
          <tbody>

        <?php
          // $code_item = $_POST['code_item'];
          $sql = "SELECT id, code_item, title_item, picture, price_item FROM tb_item";
          $result = mysqli_query($conn, $sql);

          $result_count = 0;
          $result_count_item = 0;

          while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {

            foreach ($_SESSION['array_code_item'] as $add_code_item) {

              if ($row['code_item'] == $add_code_item) {
                $result_count++;
                $result_count_item++;
                echo '
                  <div class="col-md-12" style="//border: 1px solid #abc;">


                        <tr>
                          <td style="width: 25%;">
                            <a href="#" class="thumbnail">
                              <img src="admin/process/uploads/'. $row['picture'] .'" alt="" style="background-color: #d9b38c; height: 150px;" class="img-responsive">
                            </a>
                          </td>
                          <td style="width: 20%;">
                            <span>'. $row['title_item'] .'</span><br><br>
                            <a href="cart_remove_item.php?code_item='.$row['code_item'].'">ลบรายการนี้</a>
                          </td>
                          <td style="width: 20%;">
                            <span>'. $row['price_item'] .' บาท</span>
                          </td>
                          <td style="padding-left: 0px;">

                              <div class=" col-md-2">
                                <button type="button" class="btn btn-default" style="width: 30px; background-color: #f2f2f2;" id="btn_nagative_'. $row['id'] .'">-</button>
                              </div>
                              <div class="col-md-2" style="width: 10%; margin-left: 4px; margin-right: 0px;">
                                <input type="text" class="" style="width: 25px; margin-top: 3px;" id="count_'. $row['id'] .'" value="&nbsp;1">
                              </div>
                              <div class="col-md-2">
                                <button type="button" class="btn btn-default" style="width: 30px; background-color: #f2f2f2;" id="btn_positive_'. $row['id'] .'">+</button>
                              </div>

                          </td>
                          <td style="width: 20%;">
                            <span id="txt_price_'. $row['id'] .'"> '. $row['price_item'] .' </span>บาท
                            <input type="hidden" name="'. $add_code_item .'" value="'. $add_code_item .'">
                            <input type="hidden" name="'. $row['price_item'] .'" value="'. $row['price_item'] .'">
                            <input type="hidden" name="count_'. $row['id'] .'" value="1">
                          </td>

                        </tr>


                  </div>

                  <script>

                    var count_item_'. $row['id'] .' = 1;
                    var price_'. $row['id'] .';
                    var buffer_price_'. $row['id'] .';

                    result_count_item = '.$result_count_item.';

                    $(document).ready(function() {

                      price_'. $row['id'] .' = parseInt($("#txt_price_'. $row['id'] .'").text());
                      buffer_price_'. $row['id'] .' = parseInt($("#txt_price_'. $row['id'] .'").text());

                      total_price = total_price + price_'. $row['id'] .';
                      $("#price_send").text(" " + total_price + " ");

                      $("#txt_result_price").text(total_price);

                      $("#btn_nagative_'. $row['id'] .'").click(function() {

                        if (count_item_'. $row['id'] .' > 1) {
                          count_item_'. $row['id'] .'--;
                          $("#count_'. $row['id'] .'").val(" " + count_item_'. $row['id'] .' + " ");
                          price_'. $row['id'] .' = price_'. $row['id'] .' - buffer_price_'. $row['id'] .';
                          $("#txt_price_'. $row['id'] .'").text(" " + price_'. $row['id'] .' + " ");

                          result_count_item--;
                          $("#txt_result_count_item").text(result_count_item + " ชิ้น");

                          sum = parseInt($("#txt_result_price").text()) - '.$row['price_item'].';
                          $("#txt_result_price").text(sum);

                          if ($("input[name=option_send]:checked").val() == 1) {
                            sum = sum + 150;
                          } else if ($("input[name=option_send]:checked").val() == 2) {
                            sum = sum + 200;
                          }

                          $("#price_send").text(" " + sum + " ");
                        }

                      });

                      $("#btn_positive_'. $row['id'] .'").click(function() {

                        if (count_item_'. $row['id'] .' >= 1) {
                          count_item_'. $row['id'] .'++;
                          $("#count_'. $row['id'] .'").val(" " + count_item_'. $row['id'] .' + " ");
                          price_'. $row['id'] .' = price_'. $row['id'] .' + buffer_price_'. $row['id'] .';
                          $("#txt_price_'. $row['id'] .'").text(" " + price_'. $row['id'] .' + " ");

                          result_count_item++;
                          $("#txt_result_count_item").text(result_count_item + " ชิ้น");

                          sum = parseInt($("#txt_result_price").text()) + '.$row['price_item'].';
                          $("#txt_result_price").text(sum);

                          if ($("input[name=option_send]:checked").val() == 1) {
                            sum = sum + 150;
                          } else if ($("input[name=option_send]:checked").val() == 2) {
                            sum = sum + 200;
                          }

                          $("#price_send").text(" " + sum + " ");
                        }

                      });

                      total = parseInt($("#price_send").text());

                    });
                  </script>
                ';
              }

            } // end foreach

          }

          mysqli_free_result($result);
          mysqli_close($conn);
        ?>

        <tr>
          <td>
            <span><b>สรุปรายการสินค้า</b></span>
          </td>
          <td><?php echo $result_count; ?> รายการ <span id="txt_result_count_item"><?php echo $result_count_item; ?> ชิ้น<span></td>
          <td></td>
          <td>ราคาสินค้าทั้งหมด</td>
          <td><b><span id="txt_result_price"></span></b> บาท</td>
        </tr>

      </tbody>
    </table>
    <hr style="border: 2px solid #d9d9d9;">
        <!-- item -->
        <!-- <div class="col-md-12" style="//border: 1px solid #abc;">

          <div class="col-md-offset-1 col-md-3" style="margin-top: 30px;">
            <a href="#" class="thumbnail">
              <img src="" alt="" style="background-color: #d9b38c; height: 150px;" class="img-responsive">
            </a>
          </div>

          <div class="col-md-8" style="margin-top: 100px;">
            <div class="col-md-3">
              <span><b>ราคา 0 บาท</b></span>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-danger" style="width: 40px;">-</button><span><b>&ensp; 0 &ensp;</b></span><button type="button" class="btn btn-success" style="width: 40px;">+</button>
            </div>
            <div class="col-md-5 text-right">
              <span><b>รวมราคาสินค้า 0 บาท</b></span>
            </div>
            <div class="col-md-offset-7 col-md-5 text-right">
              <span><b>รวมราคาค่าจัดส่ง 0 บาท</b></span>
            </div>
            <div class="col-md-offset-7 col-md-5 pull-right" style="margin-top: 20px;">
              <a href="index.php"><button type="button" class="btn btn-success pull-right" style="width: 112px;">เพิ่มสินค้า</button></a>
            </div>
          </div>

        </div> -->
        <!-- end item -->

        <div class="col-md-12 text-left" style="margin-top: 20px; margin-bottom: 10px;">
          <b style="font-size: 20px;">เลือกวิธีการจัดส่งสินค้า</b>
        </div>
        <div class="col-md-12 text-left">
          <input type="radio" name="option_send" id="option_send" value="0" checked> ไปรษณีย์ (จัดส่งฟรี)<br>
          <span>ระยะเวลาจัดส่ง : จัดส่งภายใน 1-3 วันหลังจากชำระเงินค่าสินค้า</span>
        </div>
        <!-- <div class="col-md-12 text-left">
          <input type="radio" name="option_send" value=""> ขนส่งด่วน<br>
          <span>วิธีคำนวณเวลา - ภายในอำเภอเมืองของแต่ละจังหวัด เหมาจ่าย 150 บาท</span><br>
          <span style="padding-left: 91px;">- นอกอำเภอเมือง เหมาจ่าย 200 บาท จัดส่งภายใน 1-3 วันหลังจากชำระเงินค่าสินค้า</span>
        </div> -->
        <div class="col-md-12 text-left">
          <br>ขนส่งด่วน<br>
          <input type="radio" name="option_send" id="option_send" value="1"><span> ภายในอำเภอเมืองของแต่ละจังหวัด เหมาจ่าย 150 บาท</span><br>
          <input type="radio" name="option_send" id="option_send" value="2"><span> นอกอำเภอเมือง เหมาจ่าย 200 บาท จัดส่งภายใน 1-3 วันหลังจากชำระเงินค่าสินค้า</span>

          <br><br><a href="index.php"><b><i class="glyphicon glyphicon-chevron-left"></i> เพิ่มสินค้า</b></a>

        </div>

        <div class="col-md-12" style="margin-bottom: 20px;">
          <div class="col-md-offset-4 col-md-8">
            <div class="col-md-offset-7 col-md-5 text-right">
              <b>รวมราคาค่าจัดส่ง<br><span id="price_send"> 0 </span>บาท</b>
            </div>
            <div class="col-md-offset-7 col-md-5 pull-right" style="margin-top: 20px;">
              <!-- <a href="shopping_cart_person.php"><button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-shopping-cart"></i> สั่งซื้อสินค้า</button></a> -->
              <a href="#" onclick="document.getElementById('my_form').submit();"><img src="template/images/btn_buy.png" class="img-responsive" style="margin-bottom: 10px;" alt="" /></a>
            </div>
          </div>
        </div>

      </form>

    </div>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  if ($_SESSION['insert_formpayment'] == 'success') {
    echo '
      <script>
        swal("แจ้งชำระเงินเรียบร้อยแล้ว", "", "success")
      </script>
    ';
    $_SESSION['insert_formpayment'] = null;
  }
?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9 text-center" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px;">

      <div class="col-md-12 text-center">
        <h2>แจ้งชำระเงิน</h2>
      </div>

      <form action="process/insert_formpayment.php" method="post" enctype="multipart/form-data" class="form-inline">

        <div class="form-group">
          <div class="col-md-12" style="margin-top: 30px;">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>ชื่อธนาคาร</th>
                  <th>ชื่อบัญชี</th>
                  <th>เลขที่บัญชี</th>
                  <th>สาขา</th>
                </tr>
              </thead>
              <tbody>
                <!-- <td><input type="radio" name="bank" value="กรุงไทย" checked></td> -->
                <?php
                  $sql = "SELECT * FROM tb_infobank";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                    echo '
                      <tr>
                        <td><input type="radio" name="bank" value="'.$row['title_bank'].'" checked></td>
                        <td>';

                    if ($row['title_bank'] == 'ธ.กสิกรไทย') {
                      echo '<img src="template/images/icon/KBANK.jpg" style="height: 25px;">';
                    } else if ($row['title_bank'] == 'ธ.ไทยพาณิชย์') {
                      echo '<img src="template/images/icon/SCB.jpg" style="height: 25px;">';
                    } else if ($row['title_bank'] == 'ธ.กรุงศรีอยุธยา') {
                      echo '<img src="template/images/icon/BAY.jpg" style="height: 25px;">';
                    } else if ($row['title_bank'] == 'ธ.กรุงไทย') {
                      echo '<img src="template/images/icon/KTB.jpg" style="height: 25px;">';
                    } else if ($row['title_bank'] == 'ธ.กรุงเทพ') {
                      echo '<img src="template/images/icon/BBL.jpg" style="height: 25px;">';
                    } else {
                      echo '<img src="template/images/icon/TMB.jpg" style="height: 25px;">';
                    }

                    echo '
                        '.$row['title_bank'].'
                        </td>
                        <!-- <td>'.$row['title_bank'].'</td> -->
                        <td>'.$row['name'].'</td>
                        <td>'.$row['number_bank'].'</td>
                        <td>'.$row['brach_bank'].'</td>
                      </tr>
                    ';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
          <div class="col-md-offset-2 col-md-3 text-right">
            <label for="">วันที่ชำระเงิน : </label>
          </div>
          <div class="col-md-7 text-left">
            <input type="date" name="payment_date" class="form-control" required>
          </div>
        </div>

        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
          <div class="col-md-offset-2 col-md-3 text-right">
            <label for="">เวลา(โดยประมาณ) : </label>
          </div>
          <div class="col-md-7 text-left">
            <select class="form-control" name="hour">
              <option>- ชม. -</option>
              <?php
                for ($i = 0; $i <= 23; $i++) {

                  switch ($i) {
                    case 0 : $i = '00'; break;
                    case 1 : $i = '01'; break;
                    case 2 : $i = '02'; break;
                    case 3 : $i = '03'; break;
                    case 4 : $i = '04'; break;
                    case 5 : $i = '05'; break;
                    case 6 : $i = '06'; break;
                    case 7 : $i = '07'; break;
                    case 8 : $i = '08'; break;
                    case 9 : $i = '09'; break;
                  }

                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
              ?>
            </select> :
            <select class="form-control" name="minute">
              <option>- นาที -</option>
              <?php
                for ($i = 0; $i <= 59; $i++) {

                  switch ($i) {
                    case 0 : $i = '00'; break;
                    case 1 : $i = '01'; break;
                    case 2 : $i = '02'; break;
                    case 3 : $i = '03'; break;
                    case 4 : $i = '04'; break;
                    case 5 : $i = '05'; break;
                    case 6 : $i = '06'; break;
                    case 7 : $i = '07'; break;
                    case 8 : $i = '08'; break;
                    case 9 : $i = '09'; break;
                  }

                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
          <div class="col-md-offset-2 col-md-3 text-right">
            <label for="">จำนวนเงิน : </label>
          </div>
          <div class="col-md-7 text-left">
            <input type="text" name="price" class="form-control" required>
          </div>
        </div>

        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
          <div class="col-md-offset-2 col-md-3 text-right">
            <label for="">หลักฐานการโอน : </label>
          </div>
          <div class="col-md-7 text-left">
            <input type="file" name="fileUpload">[ ไฟล์ jpg,png ] การแนบหลักฐานจะช่วยทำให้ตรวจสอบได้เร็วขึ้น
          </div>
        </div>

        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
          <div class="col-md-offset-2 col-md-3 text-right">
            <label for="">เลขที่ใบสั่งซื้อ : </label>
          </div>
          <div class="col-md-7 text-left">
            <input type="text" name="number_order" class="form-control" required>
          </div>
        </div>

        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
          <div class="col-md-offset-1 col-md-11">
            <button type="submit" class="btn btn-success" style="margin-left: 20px;">แจ้งชำระเงิน</button>
          </div>
        </div>

      </div>

    </form>

  </div>

</div> <!-- end row -->

<?php include('template/footer.php'); ?>

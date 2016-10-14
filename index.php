<?php
  session_start();
  include('config/db_config.php');
  include('template/header.php');

  if (!$_SESSION['array_code_item']) {
    $_SESSION['array_code_item'] = array();
  }

  // print_r($_SESSION['array_code_item']);
?>

<div class="row">

  <div class="col-md-12">

    <?php include('template/menu.php'); ?>

    <div class="col-md-9" style="background-color: #ffffe6; border: 1px solid #abc; margin-top: 5px;">

      <?php include('template/search.php'); ?>

      <?php
        $sql = "SELECT code_item, title_item, picture, price_item FROM tb_item";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
          echo '
            <div class="col-md-4" >
              <a href="item_detail.php?code_item='. $row['code_item'] .'" class="thumbnail text-center">
                <img src="admin/process/uploads/'. $row['picture'] .'" alt="" style="background-color: #d9b38c; height: 150px; width: 100%; margin-bottom: 10px;">
                รหัสสินค้า : '. $row['code_item'] .'<br>
                '. $row['title_item'] .'<br>
                '. $row['price_item'] .' บาท
              </a>
            </div>
          ';
        }

        mysqli_free_result($result);
        mysqli_close($conn);
      ?>

    </div>

  </div>

</div> <!-- end row -->

<script>
$(function() {
    $( "#text_search" ).autocomplete({
        source: 'process/autocomplete.php'
    });
});
</script>

<?php include('template/footer.php'); ?>

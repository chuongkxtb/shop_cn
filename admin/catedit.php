<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php
$cat  = new category();
if (!isset($_GET['idloaisp']) || $_GET['idloaisp'] == NULL) {
  echo "<script>window.location='catlist.php'</script>";
} else {
  $id = $_GET['idloaisp'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
// The request is using the POST method
{
  $namecat = $_POST['tenloaisp'];


  $status = $_POST['tinhtrang'];

  $updatecat = $cat->update_category($namecat, $status, $id);
}


?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa danh mục mới</h2>
    <?php
    if (isset($updateCat)) {
      echo $updateCat;
    }
    ?>
    <?php
    $get_cat_name = $cat->getcatbyId($id);
    if ($get_cat_name) {
      while ($result = $get_cat_name->fetch_assoc()) {


    ?>
        <div class="block copyblock">
          <form action="" method="post" enctype="multipart/form-data">
            <h3>&nbsp;</h3>
            <table width="200" border="1">
              <tr>
                <td colspan="2" style="text-align:center; font-size:25px">Sửa loại sản phẩm</td>
              </tr>
              <tr>
                <td width="97">ID :</td>
                <td width="87"><input type="text" value="<?php echo $result['idloaisp'] ?>" name="idloaisp"></td>
              </tr>
              <tr>
                <td width="97">Tên :</td>
                <td width="87"><input type="text" value="<?php echo $result['tenloaisp'] ?>" name="tenloaisp"></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><select name="tinhtrang">
                    <?php
                    if ($result['tinhtrang'] == 1) {
                    ?>
                      <option value="1" selected="selected">Kích hoạt</option>
                      <option value="2">Không kích hoạt</option>
                    <?php
                    } else {
                    ?>
                      <option value="1">Kích hoạt</option>
                      <option value="2" selected="selected">Không kích hoạt</option>
                    <?php
                    }
                    ?>
                <td colspan="2">
                  <div align="center">
                    <input type="submit" name="them" value="update">
                  </div>
                </td>
              </tr>
            </table>
          </form>

      <?php
      }
    }
      ?>

        </div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
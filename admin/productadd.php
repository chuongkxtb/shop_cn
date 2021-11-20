<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/brand.php' ?>
<?php include_once '../classes/category.php' ?>
<?php include_once '../classes/product.php' ?>

<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $insertproduct = $pd->insert_product($_POST, $_FILES);
}
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Thêm sản phẩm mới</h2>
    <div class="block">
      <?php
      if (isset($insertProduct)) {
        echo $insertProduct;
      }
      ?>

      <form action="productadd.php" method="post" enctype="multipart/form-data">
        <h3>&nbsp;</h3>
        <table width="600" border="1">
          <tr>
            <td colspan="2" style="text-align:center;font-size:25px;">Thêm sản phẩm</td>
          </tr>
          <tr>
            <td width="97">Tên sản phẫm</td>
            <td width="87"><input type="text" name="tensp"></td>
          </tr>
          <tr>
            <td>Mã SP</td>
            <td><input type="text" name="masp"></td>
          </tr>
          <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh" /></td>
          </tr>
          <tr>
            <td>Giá đề xuất</td>
            <td><input type="text" name="giadexuat"></td>
          </tr>
          <tr>
            <td>Giá giảm</td>
            <td><input type="text" name="giagiam"></td>
          </tr>
          <tr>
            <td>Nội dung</td>
            <td><textarea name="noidung" cols="40" rows="10"></textarea></td>
          </tr>
          <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong"></td>
          </tr>
          <tr>
            <td>
              <label>Category</label>
            </td>
            <td>
              <select id="select" name="loaisp">
                <option>------Select Category------</option>
                <?php
                $cat = new category();
                $catlist = $cat->show_category();

                if ($catlist) {
                  while ($result = $catlist->fetch_assoc()) {
                ?>
                    <option value="<?php echo $result['idloaisp'] ?>"><?php echo $result['tenloaisp'] ?></option>
                <?php
                  }
                }
                ?>

              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label>Brand</label>
            </td>
            <td>
              <select id="select" name="brand">
                <option>------Select Brand------</option>
                <?php
                $brand = new brand();
                $brandlist = $brand->show_brand();

                if ($brandlist) {
                  while ($result = $brandlist->fetch_assoc()) {
                ?>
                    <option value="<?php echo $result['idhieusp'] ?>"><?php echo $result['tenhieusp'] ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Tình trạng</td>
            <td><select name="tinhtrang">

                <option value="1">Kích hoạt</option>
                <option value="2">Không kích hoạt</option>
              </select></td>
          </tr>
          <tr>
            <td colspan="2">
              <div align="center">
                <input type="submit" name="them" value="Thêm sản phẩm">
              </div>
            </td>
          </tr>
        </table>
      </form>


    </div>
  </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
  });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>
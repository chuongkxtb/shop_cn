<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namecat = $_POST['tenloaisp'];
    $status = $_POST['tinhtrang'];

    $insertcat = $cat->insert_category($namecat, $status);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm danh mục mới</h2>
        <?php
        if (isset($insertcat)) {
            return $insertcat;
        }

        ?>
        <div class="block copyblock">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>&nbsp;</h3>
                <table width="200" border="1">
                    <tr>
                        <td colspan="2" style="text-align:center; font-size:25px">Thêm loại sản phẩm</td>
                    </tr>
                    <tr>
                        <td width="97">Tên</td>
                        <td width="87"><input type="text" name="tenloaisp"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><select name="tinhtrang">
                                <option value="1">Kích hoạt</option>
                                <option value="2">Không kích hoạt</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div align="center">
                                <input type="submit" name="them" value="Thêm">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php' ?>
<?php

if (!isset($_GET['idhieusp']) || $_GET['idhieusp'] == NULL) {
    echo "<script>window.location = 'brandedit.php'</script>";
} else {
    $id = $_GET['idhieusp'];
}
$br = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namebr = $_POST['tenhieusp'];
    $status = $_POST['tinhtrang'];

    $updatebr = $br->update_brand($namebr, $status, $id);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa thương hiệu</h2>
        <?php
        if (isset($updatebr)) {
            return $updatebr;
        }
        ?>
        <?Php
        $get_brname = $br->getbrbyid($id);
        if ($get_brname) {
            while ($result = $get_brname->fetch_assoc()) {


        ?>

                <div class="block copyblock">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3>&nbsp;</h3>
                        <table width="200" border="1">
                            <tr>
                                <td colspan="2" style="text-align:center;font-size:25px;">Sửa hiệu sản phẩm</td>
                            </tr>
                            <tr>
                                <td width="97">id hieu sp</td>
                                <td width="87"><input type="text" value="<?php echo $result['idhieusp'] ?>" name="idloaisp"></td>
                            </tr>
                            <tr>
                                <td width="97">Tên loại sp</td>
                                <td width="87"><input type="text" name="hieusp" value="<?php echo $result['tenhieusp'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tình trạng</td>
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
                                    </select></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="center">
                                        <input type="submit" name="sua" value="Sửa">
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
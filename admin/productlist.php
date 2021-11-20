<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php' ?>
<?php include_once '../classes/category.php' ?>
<?php include_once '../classes/product.php' ?>
<?php
 $cat = new product();
	if(isset($_GET['delid']))
  {
    $id = $_GET['delid'];
    $deletecat = $cat->delete_category($id);
  }


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
			<thead>
			<tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Mã sp</td>
    <td>Hình ảnh</td>
    <td>Giá đề xuất</td>
    <td>Giá giảm</td>
    <td>Số lượng</td>
    <!-- <td>Loại hàng</td> -->
    <!-- <td>Nhà SX</td> -->
    <td>Tình trạng</td>
    <td>Quản lý</td>
  </tr>
			</thead>
			<tbody>
			<?php
      $pd =  new product();
      $show_product = $pd->show_product();
      if($show_product)
      {
        $i = 0;
        while($result = $show_product->fetch_assoc()){
          $i++;


  ?> <tr>

  <td><?php  echo $i;?></td>
  <td><?php echo $result['tensp'] ?></td>
  <td><?php echo $result['masp'] ?></td>
  <td><img src="uploads/<?php echo $result['hinhanh'] ?>" width="80" height="80" />
  <!-- <a href="index.php?quanly=gallery&ac=lietke&id=<?php echo $result['idsanpham'] ?>" style="text-align:center;text-decoration:none; font-size:18px;color:#06F;">Gallery</a> -->
  </td>
  <td><?php echo number_format($result['giadexuat']) ?></td>
  <td><?php echo number_format($result['giagiam']) ?></td>
  <td><?php echo $result['soluong'] ?></td>
  <!-- <td><?php echo $result['tenloaisp'] ?></td>
  <td><?php echo $result['tenhieusp'] ?></td> -->
  <td><?php $sql_tinhtrang = "select tinhtrang from sanpham";

  if($result['tinhtrang'] == 1 ){
	  echo 'Kích hoạt';
  }elseif($result['tinhtrang'] ==2){
	  echo 'Không kích hoạt';
  }
  ?></td>
   <td><a href="productedit.php?idsanpham=<?php echo $result['idsanpham'] ?>">Edit</a> || <a onclick="return confirm('you are want to delete')" href="?delid=<?php echo $result['idsanpham'] ?>">Delete</a> </td>
</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

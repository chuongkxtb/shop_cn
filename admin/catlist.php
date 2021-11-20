<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php'	?>
<?php
$cat = new category();
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$deleleCat = $cat->delete_category($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<?php
			if (isset($deleteCat)) {
				echo $deleleCat;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<td>ID</td>
						<td>Tên loại sản phẩm</td>
						<td>Tình trạng</td>
						<td>Quản lý</td>
					</tr>
				</thead>

				<tbody>
					<?php
					$show_cat = $cat->show_category();
					if ($show_cat) {
						$i = 0;
						while ($result = $show_cat->fetch_assoc()) {
							$i++;

					?>
							<tr>
								<td><?php echo $result['idloaisp'] ?></td>
								<td><?php echo $result['tenloaisp'] ?></td>
								<td><?php
									if ($result['tinhtrang'] == 1) {
										echo 'Kích hoạt';
									} else {
										echo 'Không kích hoạt';
									}
									?></td>
								<td><a href="catedit.php?idloaisp=<?php echo $result['idloaisp'] ?>">Edit</a> || <a onclick="return confirm('you are want to delete')" href="?delid=<?php echo $result['idloaisp'] ?>">Delete</a> </td>
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
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>
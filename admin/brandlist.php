<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php' ?>
<?php
$br = new brand();
if (isset($_GET['delid'])) {
  $id = $_GET['delid'];
  $deletebr = $br->delete_brand($id);
}


?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Brand List</h2>
    <div class="block">
      <?php
      if (isset($deletebr)) {
        return $deletebr;
      }
      ?>
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Brand Name</th>
            <th>Action</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $show_br = $br->show_brand();
          if ($show_br) {
            $i = 0;
            while ($result = $show_br->fetch_assoc()) {
              $i++;


          ?>
              <tr>
                <td><?php echo $result['idhieusp'] ?></td>
                <td><?php echo $result['tenhieusp'] ?></td>
                <td><?php
                    if ($result['tinhtrang'] == 1) {
                      echo 'Kích hoạt';
                    } else {
                      echo 'Không kích hoạt';
                    }
                    ?></td>
                <td><a href="brandedit.php?idhieusp=<?php echo $result['idhieusp'] ?>">Edit</a> || <a onclick="return confirm('you are want to delete')" href="?delid=<?php echo $result['idhieusp'] ?>">Delete</a> </td>
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
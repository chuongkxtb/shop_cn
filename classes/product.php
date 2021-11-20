<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';

?>

<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function insert_product($data,$files){
         

            $tensp= mysqli_real_escape_string($this->db->link,$data['tensp']);
            $masp= mysqli_real_escape_string($this->db->link,$data['masp']);

 

            $hinhanh=$_FILES['hinhanh']['name'];
	        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];


            $giadexuat= mysqli_real_escape_string($this->db->link,$data['giadexuat']);
            // $giamgia= mysqli_real_escape_string($this->db->link,$data['giamgia']);
           
            $soluong= mysqli_real_escape_string($this->db->link,$data['soluong']);
            
        
            $noidung= mysqli_real_escape_string($this->db->link,$data['noidung']);
            if($tensp==""){
                $alert = "Không được để trống";
                return $alert;
            }else{
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
                $query = "INSERT INTO sanpham(tensp,masp,hinhanh,giadexuat,soluong,noidung) 
                                      VALUES ('$tensp','$masp','$hinhanh','$giadexuat','$soluong','$noidung')";
                $result = $this->db->insert($query);
                if($result)
                {
                   
                    $alert= " <span class = 'success'>Thêm thành công </span>";
                    return $alert;
                }else{
                    $alert= " <span class = 'error'>Thêm không thành công </span>";
                    return $alert;
                }
            }
        }
        public function show_product(){
            $query = "SELECT * FROM sanpham order by idsanpham desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyid($id){
            $query = "SELECT * FROM sanpham WHERE idsanpham='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            $id= mysqli_real_escape_string($this->db->link,$id);
            $tensp= mysqli_real_escape_string($this->db->link,$data['tensp']);
            $masp= mysqli_real_escape_string($this->db->link,$data['masp']);

            $hinhanh=$_FILES['hinhanh']['name'];
	        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];;

            $giadexuat= mysqli_real_escape_string($this->db->link,$data['giadexuat']);
            // $giamgia= mysqli_real_escape_string($this->db->link,$data['giamgia']);
           
            $soluong= mysqli_real_escape_string($this->db->link,$data['soluong']);
            
        
            $noidung= mysqli_real_escape_string($this->db->link,$data['noidung']);

            if($tensp==" "){
                $alert = "Không được để trống";
                return $alert;
            }else{
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
                $query = "update sanpham set tensp='$tensp',masp='$masp',hinhanh='$hinhanh',giadexuat='$giadexuat',soluong='$soluong',noidung='$noidung' where idsanpham='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                   
                    $alert= " <span class = 'success'>Update thành công </span>";
                    return $alert;
                }else{
                    $alert= " <span class = 'error'>Update không thành công </span>";
                    return $alert;
                }
            }
        }
        public function delete_category($id){
            $query = "DELETE FROM sanpham WHERE idsanpham='$id'";
            $result = $this->db->delete($query);
            return $result;
        }
    }
?>
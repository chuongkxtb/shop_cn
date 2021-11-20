<?php
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>

<?php
    class adminlogin
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function login_admin($adminUser,$adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser= mysqli_real_escape_string($this->db->link,$adminUser);
            $adminPass= mysqli_real_escape_string($this->db->link,$adminPass);

            if(empty($adminPass) || empty($adminUser)){
                $alert = "Không được để trống tài khoản và mật khẩu";
                return $alert;
            }else{
                $query = "SELECT * FROM admin WHERE username = '$adminUser' AND password = '$adminPass'";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('idadmin',$value['idadmin']);
                    Session::set('username',$value['username']);
                    Session::set('password',$value['password']);
                    header('Location:index.php');
                }else{
                    $alert = "User and Pass not ok";
                    return $alert;
                }
            }
        }
    }
?>
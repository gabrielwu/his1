<?php
class AdminAction extends GlobalAction{
    public $passwordInitial;
    public function __construct() {  
        parent::__construct(); 
        $this->m = M("admin"); 
        $this->passwordInitial = "123456";
        $this->permissionType  = "0";
    }
    public function index(){
        if ($this->isPermitted()) {
            $adminType = isset($_GET["_URL_"][2]) ? $_GET["_URL_"][2] : $_GET['adminType'];
            $username  = isset($_GET["_URL_"][3]) ? $_GET["_URL_"][3] : $_GET['username'];
            $sqlWhere  = "1=1 ";
            if ($adminType != null && $adminType != "") {
                $sqlWhere .= "and department_id='$adminType' ";
            } 
            if ($username != null && $username != "") {
                $sqlWhere .= "and username='$username' ";
            } 
            $list = $this->m->where($sqlWhere)->select();
            $listDepartment = M("department")->where("status='1'")->select();
            $this->assign("list", $list);
            $this->assign("adminType", $adminType);
            $this->assign("listDepartment", $listDepartment);
            $this->assign("passwordInitial", $this->passwordInitial);
            $this->display();
        }
    }
    public function add(){
        if ($this->isPermitted()) {
            $data = $this->getData();
            $data["password"] = md5($this->passwordInitial);
            echo $this->m->add($data) > 0 ? 1 : 0;
        } 
    }
    public function edit(){
        parent::edit();
    }
    public function remove(){
        parent::remove();
    }
    public function resetPassword(){
        if ($this->isPermitted()) {
            $id  = $_POST["id"];
            $sql = "update __TABLE__ set password=md5($this->passwordInitial) where id=$id";
            $this->m->execute($sql);
            echo mysql_affected_rows();
        } 
    }
}
?>
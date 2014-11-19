<?php
class MedicineAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("medicine"); 
        $this->table = "medicine"; 
        $this->permissionType  = "1";
    }
    public function index(){
        if ($this->isPermitted()) {
            $status    = isset($_GET["_URL_"][2]) ? $_GET["_URL_"][2] : "-1";
            $name      = $_GET["_URL_"][3];
            $sqlWhere  = "department_id='".$_SESSION['adminType']."' ";
            if ($name != null && $name != "") {
                $sqlWhere .= "and name='$name' ";
            } 
            if ($status != null && $status != "" && $status != "-1") {
                $sqlWhere .= "and status='$status' ";
            } 
            $list = $this->m->where($sqlWhere)->select();
            $sqlWhere = "status='1' ";
            if ($_SESSION['adminType'] > 0) {
                $sqlWhere .= "and department_id='".$_SESSION['adminType']."'";
            }
            $listDepartment = M("department")->where()->select();
            $this->assign("list", $list);
            $this->assign("listDepartment", $listDepartment);
            $this->assign("adminType", $adminType);
            $this->assign("status", $status);
            $this->display();
        }
    }
    public function add(){
        if ($this->isPermitted()) {
            $data = $this->getData();
            $data['department_id'] = $_SESSION['adminType'];
            $data['status'] = "1";
            echo $this->m->add($data) > 0 ? 1 : 0;
        } 
    }
    public function edit(){
        parent::edit();
    }
    public function remove(){
        parent::remove();
    }
}
?>
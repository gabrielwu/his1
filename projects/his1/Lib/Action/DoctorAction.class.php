<?php
class DoctorAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("doctor"); 
        $this->table = "doctor"; 
        $this->permissionType  = "1";
    }
    public function index(){
        if ($this->isPermitted()) {
            $count = $this->m->where()->count("id");
            $page = new Page($count, 15);
            $show = $page->show();
            $this->assign("pageShow", $show);
            $sqlLimit = "$page->firstRow, $page->listRows";
            $list = $this->m->limit($sqlLimit)->select();
            $this->assign("list", $list);
            $listTitle = M("title")->where("status='1'")->select();
            $this->assign("list", $list);
            $this->assign("listTitle", $listTitle);
            $this->display();
        }
    }
    public function view(){
        $this->permissionType  = "2";
        if ($this->isPermitted()) {
            $id = $_SESSION["user_id"];
            $data = $this->m->where("id=$id")->find();
            $this->assign("data", $data);
            $listTitle = M("title")->where("status='1'")->select();
            $this->assign("list", $list);
            $this->assign("listTitle", $listTitle);
            $this->display();
        }
    }
    public function add(){
        if ($this->isPermitted()) {
            $data = $this->getData();
            //$data["department_id"] = $_SESSION['department_id'];
            $data["password"] = md5($_POST['job_id']);
            echo $this->m->add($data) > 0 ? 1 : 0;
        } 
    }
    public function edit(){
        if ($this->isPermitted()) {
            $id   = $_POST["id"];
            $data = $this->getData();
            //$data["department_id"] = $_SESSION['department_id'];
            echo $this->m->where("id=$id")->save($data);
        } 
    }
    public function editPersonal(){
        $this->permissionType  = "2";
        if ($this->isPermitted()) {
            $id   = $_SESSION["user_id"];
            $data = $this->getData();
            //$data["department_id"] = $_SESSION['department_id'];
            echo $this->m->where("id=$id")->save($data);
        } 
    }
    public function remove(){
        parent::remove();
    }
    public function resetPassword(){
        if ($this->isPermitted()) {
            $id  = $_POST["id"];
            $sql = "update __TABLE__ set password=md5(job_id) where id=$id";
            //echo $sql;
            $this->m->execute($sql);
            echo mysql_affected_rows();
        } 
    }
}
?>
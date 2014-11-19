<?php
class DepartmentAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("department"); 
        $this->table = "department"; 
        $this->permissionType  = "0";
    }
    public function index(){
        if ($this->isPermitted()) {
            $list = $this->m->select();
            $listInpatientArea = M("inpatient_area")->where("status='1'")->select();
            $this->assign("list", $list);
            $this->assign("listInpatientArea", $listInpatientArea);
            $this->display();
        }
    }
    public function add(){
        parent::add();
    }
    public function edit(){
        parent::edit();
    }
    public function remove(){
        parent::remove();
    }
}
?>
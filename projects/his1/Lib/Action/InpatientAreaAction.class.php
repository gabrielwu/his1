<?php
class InpatientAreaAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("inpatient_area"); 
        $this->table = "inpatient_area"; 
        $this->permissionType  = "0";
    }
    public function index(){
        parent::index();
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
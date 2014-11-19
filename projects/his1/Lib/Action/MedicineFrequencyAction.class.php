<?php
class MedicineFrequencyAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("medicine_frequency"); 
        $this->table = "medicine_frequency"; 
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
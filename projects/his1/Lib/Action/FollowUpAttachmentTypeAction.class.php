<?php
class FollowUpAttachmentTypeAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("follow_up_attachment_type"); 
        $this->table = "follow_up_attachment_type"; 
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
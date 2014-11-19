<?php
class OperationFieldAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("operation_field"); 
        $this->table = "operation_field"; 
        $this->permissionType  = "1";
        $this->isPermitted();
    }
    public function index(){
        $department_id = $_SESSION['adminType'];
        $sqlWhere = "department_id=$department_id";
        $count = $this->m->where($sqlWhere)->count("id");
        $page  = new Page($count, 7);
        $sqlLimit = "$page->firstRow, $page->listRows";
        $list  = $this->m->where($sqlWhere)->limit($sqlLimit)->order("name")->select();
        $show  = $page->show();
        $this->assign("list", $list);
        $listFather = $this->m->where($sqlWhere. " and father_id=0")->select();
        $this->assign("listFather", $listFather);
        $this->assign("pageShow", $show);
        $this->display();
    }            
    public function add(){
        $data = $this->getData();
        $data["value_options"] = str_replace("，",",",$data["value_options"]);
        $data["department_id"] = $_SESSION["adminType"];
        echo $this->m->add($data) > 0 ? 1 : 0;
    }
    public function edit(){
        $data["department_id"] = $_SESSION["adminType"];
        $id   = $_POST["id"];
        $data = $this->getData();
        $data["value_options"] = str_replace("，",",",$data["value_options"]);
        echo $this->m->where("id=$id")->save($data);
    }
    public function remove(){
        parent::remove();
    }
}
?>
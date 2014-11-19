<?php
class OperationTypeFieldAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("operation_type_field"); 
        $this->table = "operation_type_field"; 
        $this->permissionType  = "1";
        $this->isPermitted();
    }
    public function index(){
        $id = $_GET["_URL_"][2];
        $_SESSION["operation_type_id"] = $id;
        $department_id = $_SESSION['adminType'];

        $sql  = "select f.id as operation_field_id, f.name, tf.id from operation_field f ";
        $sql .= "left join operation_type_field tf on tf.operation_type_id=$id and tf.operation_field_id=f.id ";
        $sql .= "where  f.father_id=0 and f.department_id=$department_id ";
        
        $list  = $this->m->query($sql);
        $this->assign("list", $list);

        $sql   = "select name,id from operation_type where id=$id ";
        $types = $this->m->query($sql);
        $this->assign("operation_type", $types[0]);
        $this->display();
    }      
    public function edit(){
        $data["department_id"] = $_SESSION["adminType"];
        $operation_type_id = $_SESSION["operation_type_id"];

        $this->m->query("delete from operation_type_field where operation_type_id=$operation_type_id");

        $operation_field_id_str = $_POST["operation_field_id_str"];

        $operation_field_id_array = explode(",", $operation_field_id_str);
        $operation_field_id_s = array();
        foreach ($operation_field_id_array as $value) {
            if ($value != "") {
                $item = array();
                $item["operation_type_id"]  = $operation_type_id;
                $item["operation_field_id"] = $value;
                array_push($operation_field_id_s, $item);
            }
        }
        $this->m->addAll($operation_field_id_s);
        echo "1";
    }
}
?>
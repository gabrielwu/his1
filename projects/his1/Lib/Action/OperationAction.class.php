<?php
class OperationAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("operation"); 
        $this->table = "operation"; 
        $this->permissionType  = "2";
        $this->isPermitted();
    }
    public function index() {
        $sql = "select p.id, p.medical_id, p.name, p.sex, p.age, o.id as operation_id, ";
        $sql.= "dd.name as diagnosis_name, d.name as doctor_name, o.begin_time, d1.name as operator_name, ot.name as operation_type_name ";
        $sql.= "from operation o ";
        $sql.= "left join operation_type ot on ot.id=o.operation_type_id ";
        $sql.= "left join patient p on p.id=o.patient_id ";
        $sql.= "left join diagnosis dd on p.diagnosis_id=dd.id ";
        $sql.= "left join doctor d  on  d.id=p.attending_doctor_id ";
        $sql.= "left join doctor d1 on d1.id=o.operator_id ";
        $sql.= "where 1=1 ";

        $con = $_REQUEST;
        if (($medical_id = $con["medical_id"]) != "") {
            $sql .= "and p.medical_id=$medical_id ";
        }
        if (($name = $con["name"]) != "") {
            $sql .= "and p.name='$name' ";
        }
        if (($sex = $con["sex"]) != "") {
            $sql .= "and p.sex='$sex' ";
        }
        if (($age = $con["age"]) != "") {
            $sql .= "and p.age='$age' ";
        }
        if (($diagnosis_id = $con["diagnosis_id"]) != "") {
            $sql .= "and dd.id=$diagnosis_id ";
        }
        if (($doctor_id = $con["doctor_id"]) != "") {
            $sql .= "and d.id=$doctor_id ";
        }
        if (($begin_time = $con["begin_time"]) != "") {
            $sql .= "and o.begin_time like '$begin_time%' ";
        }
        if (($operation_type_id = $con["operation_type_id"]) != "") {
            $sql .= "and ot.id=$operation_type_id ";
        }
        if (($operator_id = $con["operator_id"]) != "") {
            $sql .= "and o.operator_id=$operator_id ";
        }
        //echo $sql;;
        $list = $this->m->query($sql);
        $count = sizeof($list);
        $page  = new Page($count, 1);
        $sqlLimit = "limit $page->firstRow, $page->listRows";
        $list = $this->m->query($sql. $sqlLimit);
        $this->assign("list", $list);
        $show  = $page->show();
        $this->assign("pageShow", $show);

        $listDiagnosis = M("diagnosis")->select();
        $this->assign("listDiagnosis", $listDiagnosis);

        $department_id = $_SESSION["department_id"];
        $listDoctor = M("doctor")->where("department_id=$department_id")->select();
        $this->assign("listDoctor", $listDoctor);
        $listOperationType = M("operation_type")->where("department_id=$department_id")->select();
        $this->assign("listOperationType", $listOperationType);

        $this->assign("medical_id", $medical_id);
        $this->assign("name", $name);
        $this->assign("age", $age);
        $this->assign("sex", $sex);
        $this->assign("diagnosis_id", $diagnosis_id);
        $this->assign("doctor_id", $doctor_id);
        $this->assign("begin_time", $begin_time);
        $this->assign("operation_type_id", $operation_type_id);
        $this->assign("operator_id", $operator_id);
        $this->display();
    }
    public function addInput() {
        $patient_id = $_REQUEST["patient_id"];
        $_SESSION["patient_id_add"] = $patient_id;
        $department_id = $_SESSION["department_id"];

        $listOperationType = M("operation_type")->where("department_id=$department_id and status='1'")->select();
        $this->assign("listOperationType", $listOperationType);
        $listDoctor = M("doctor")->where("department_id=$department_id")->select();
        $this->assign("listDoctor", $listDoctor);
        $patient = M("patient")->where("id=$patient_id")->find();
        $this->assign("patient", $patient);

        $this->assign("patient_id_add", $patient_id);
        $this->assign("operate", "新建");
        $this->assign("operate_url",  __URL__. "/addInputSubmit");
        $this->assign("redirect_url", __URL__. "/addInput2");
        $this->display("update");
    }
    public function addInput2() {
        $department_id     = $_SESSION["department_id"];
        $patient_id        = $_SESSION["patient_id_add"];
        $operation_type_id = $_SESSION["operation_type_id_add"];
        $operation_id      = $_SESSION["operation_id_add"];


        $patient = M("patient")->where("id=$patient_id")->find();
        $this->assign("patient", $patient);
        $sql  = "select o.*, ot.name as operation_type_name, ";
        $sql .= "d.name as operator_name, d1.name as assistant1_name, d2.name as assistant2_name ";
        $sql .= "from operation_type ot, doctor d, operation o ";
        $sql .= "left join doctor d1 on o.assistant1_id=d1.id ";
        $sql .= "left join doctor d2 on o.assistant2_id=d2.id ";
        $sql .= "where o.operation_type_id=ot.id and o.id=$operation_id and o.operator_id=d.id";

        $operation = M()->query($sql);
        $this->assign("operation", $operation[0]);

        $department_id = $_SESSION["department_id"];
        $operationType = M("operation_type")->where("department_id=$department_id and operation_type_id=$operation_type_id")->find();

        $sql  = "select of.* from operation_field of, operation_type_field otf ";
        $sql .= "where of.department_id=$department_id and ";
        $sql .= "otf.operation_type_id=$operation_type_id and otf.operation_field_id=of.id and of.father_id=0 ";
        $listFieldFather = M()->query($sql);
        //echo $sql;
        foreach ($listFieldFather as &$father) {
            $father["value_options"] = explode(",", $father["value_options"]);
            $father_id = $father["id"];
            $sql  = "select of.* from operation_field of, operation_type_field otf ";
            $sql .= "where of.department_id=$department_id and ";
            $sql .= "otf.operation_type_id=$operation_type_id and otf.operation_field_id=of.father_id ";
            $sql .= "and of.father_id=$father_id and of.father_id!=0 ";
            $father["sons"] = M()->query($sql);
            foreach ($father["sons"] as &$son) {
                $son["value_options"] = explode(",", $son["value_options"]);
            }
                //echo "$sql<br>";
        }
        $operationType["field"] = $listFieldFather;
        
        echo $operationType["name"];
        $this->assign("operationType", $operationType);

        $this->assign("operate", "新建");
        $this->assign("operate_url",  __URL__. "/addInputSubmit2");
        $this->assign("redirect_url", __URL__. "/view/$operation_id");
        $this->display("update2");
    }
    public function addInputSubmit() {
        $data = $_POST;
        $data["patient_id"] = $_SESSION["patient_id_add"];
        $return = $this->m->add($data);
        $_SESSION["operation_id_add"] = $return;
        $_SESSION["operation_type_id_add"] = $data["operation_type_id"];
        echo $return > 0 ? 1 : 0;
    }
    public function addInputSubmit2() {
        $str = $_POST["str"];
        $operationFieldArray = explode("|", $str);
        $dataArray = array();
        foreach ($operationFieldArray as $operationField) {
            $columns = explode(";", $operationField);
            $data = array();
            $data["operation_id"]    = $_SESSION["operation_id_add"];
            $data["father_field_id"] = $columns[0];
            $data["field"]           = $columns[1];
            $data["value"]           = $columns[2];
            array_push($dataArray, $data);
        }
        M("operation_detail")->addAll($dataArray);
        echo 1;
    }
    public function view() {
        $operation_id = $_GET["_URL_"][2];
        $sql  = "select o.*, ot.name as operation_type_name, ";
        $sql .= "d.name as operator_name, d1.name as assistant1_name, d2.name as assistant2_name ";
        $sql .= "from operation_type ot, doctor d, operation o ";
        $sql .= "left join doctor d1 on o.assistant1_id=d1.id ";
        $sql .= "left join doctor d2 on o.assistant2_id=d2.id ";
        $sql .= "where o.operation_type_id=ot.id and o.id=$operation_id and o.operator_id=d.id ";
        $datas = M()->query($sql);
        $data = $datas[0];
        $this->assign("data", $data);
        $patient_id = $data["patient_id"];
        $patient = M("patient")->where("id=$patient_id")->find();
        $this->assign("patient", $patient);

        $fields = M("operation_detail")->where("operation_id=$operation_id")->select();
        //var_dump($fields);
        $id_tmp = 0;
        $fieldArray = array();
        $cnt = 0;
        $details = array();
        $flag = true;
        foreach ($fields as $value) {
            $father_field_id = $value["father_field_id"];
            $field_values = explode(",", $value["value"]);
            if ($id_tmp != $father_field_id) {
                if ($cnt > 0) {
                    array_push($details, $tmp);
                }
                $flag = false;
                $cnt++;
                $id_tmp = $father_field_id;
                $sql = "select name from operation_field where id in (". $value["field"]. ")";
                $field_names = M()->query($sql);
                $father_field = M("operation_field")->where("id=$father_field_id")->find();
                $tmp = array();
                $tmp["father_field"] = $father_field;
                $tmp["field_names"]  = $field_names;
                $tmp["field_values"] = array();
                array_push($tmp["field_values"], $field_values);
            } else {
                $flag = true;
                array_push($tmp["field_values"], $field_values);
            }
        }
        array_push($details, $tmp);
        $this->assign("details", $details);
        $this->display();
    }
    public function remove(){
        $id = $_POST["id"];
        if($this->m->where("id=$id")->delete() == "1") {
            M("operation_detail")->where("operation_id=$id")->delete();
            echo 1;
        } else {
            echo 0;
        }
    }
}
?>
<?php
class PatientAction extends GlobalAction{
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("patient"); 
        $this->table = "patient"; 
        $this->permissionType  = "2";
        $this->isPermitted();
    }
    public function indexResult() {
        $department_id = $_SESSION["department_id"];
        $cnt = $_REQUEST["cnt"];
        $listOperationFieldSearch = M("operation_field")->where("department_id=$department_id and search='1'")->select();
        $sql = "select p.id, p.medical_id, p.name, p.sex, p.age, p.admission_time, dd.name as diagnosis_name, d.name as doctor_name ";
        $sql.= "from patient p left join diagnosis dd on p.diagnosis_id=dd.id left join doctor d on d.id=p.attending_doctor_id where 1=1 ";
        $operateArray = array("and", "or", "and not");
        for ($i = 1; $i <= $cnt; $i++) {
            $con = $_REQUEST;
            $operate = $operateArray[$con["operate_$i"]];//echo $operate."<br>";
            $sql .= "$operate (1=1 ";
            if (($medical_id = $con["medical_id_$i"]) != "") {
                $sql .= "and p.medical_id=$medical_id ";
            }
            if (($name = $con["name_$i"]) != "") {
                $sql .= "and p.name='$name' ";
            }
            if (($sex = $con["sex_$i"]) != "") {
                $sql .= "and p.sex='$sex' ";
            }
            if (($age = $con["age_$i"]) != "") {
                $sql .= "and p.age='$age' ";
            }
            if (($diagnosis_id = $con["diagnosis_id_$i"]) != "") {
                $sql .= "and dd.id=$diagnosis_id ";
            }
            if (($doctor_id = $con["doctor_id_$i"]) != "") {
                $sql .= "and d.id=$doctor_id ";
            }
            if (($admission_time = $con["admission_time_$i"]) != "") {
                $sql .= "and p.id=$admission_time ";
            }
            if (($medicine_id = $con["medicine_id_$i"]) != "") {
                $sql .= "and p.id in (select patient_id from patient_medication where medicine_id=$medicine_id) ";
            }
            foreach ($listOperationFieldSearch as &$value) {
                $field_id = $value["id"];
                if (($field_value = $con["$field_id". "_$i"]) != "") {
                    $sql .= "and p.id in (select patient_id from operation where ";
                    $sql .= "id in (select operation_id from operation_detail where field like '%$field_id%' and value like '%$field_value%' )) ";
                }
            }
            $sql .= ") ";
        }

        //echo $sql;
        $list = $this->m->query($sql);
        $count = sizeof($list);
        $page  = new Page($count, 15);
        $sqlLimit = "limit $page->firstRow, $page->listRows";
        $list = $this->m->query($sql. $sqlLimit);
        $this->assign("list", $list);
        $show  = $page->show();
        $this->assign("pageShow", $show);
        $this->display();
    }
    public function index() {
        $department_id = $_SESSION["department_id"];

        $listOperationFieldSearch = M("operation_field")->where("department_id=$department_id and search='1'")->select();
        foreach ($listOperationFieldSearch as &$value) {
            $value["search"] = $field_value;
            $value_options = $value["value_options"];
            $value["options"] = explode(",", $value_options);
        }
        $this->assign("listOperationFieldSearch", $listOperationFieldSearch);

        $listDiagnosis = M("diagnosis")->select();
        $this->assign("listDiagnosis", $listDiagnosis);

        $listDoctor = M("doctor")->where("department_id=$department_id")->select();
        $this->assign("listDoctor", $listDoctor);
        $listMedicine = M("medicine")->where("department_id=$department_id")->select();
        $this->assign("listMedicine", $listMedicine);

        $this->assign("medical_id", $medical_id);
        $this->assign("name", $name);
        $this->assign("age", $age);
        $this->assign("sex", $sex);
        $this->assign("diagnosis_id", $diagnosis_id);
        $this->assign("doctor_id", $doctor_id);
        $this->assign("medicine_id", $medicine_id);
        $this->assign("admission_time", $admission_time);
		$this->display();
    }
    public function addInput() {
        $listDiagnosis = M("diagnosis")->select();
        $this->assign("listDiagnosis", $listDiagnosis);

        $department_id = $_SESSION["department_id"];
        $listDoctor = M("doctor")->where("department_id=$department_id")->select();
        $this->assign("listDoctor", $listDoctor);

        $this->assign("department_name", $_SESSION["department_name"]);
        $this->assign("inpatient_area",  $_SESSION["inpatient_area"]);

        $listMedicine = M("medicine")->where("status='1'")->select();
        $this->assign("listMedicine", $listMedicine);
        $listMedicineUnit = M("medicine_unit")->where("status='1'")->select();
        $this->assign("listMedicineUnit", $listMedicineUnit);
        $listMedicineUsage = M("medicine_usage")->where("status='1'")->select();
        $this->assign("listMedicineUsage", $listMedicineUsage);
        $listMedicineFrequency = M("medicine_frequency")->where("status='1'")->select();
        $this->assign("listMedicineFrequency", $listMedicineFrequency);

        $listPatientMedication = M("patient_medication")->where("patient_id=$id")->select();
        $this->assign("listPatientMedication", $listPatientMedication);

        $this->assign("id_type", $this->id_type);
        $this->assign("operate", "新建");
        $this->assign("operate_url", __URL__. "/add");
        $this->display("update");
    }
    public function view() {
    	$id = $_GET["_URL_"][2];
    	$_SESSION["patient_id"] = $id;

    	$data = $this->m->where("id=$id")->find();
        $this->assign("data", $data);

        $listDiagnosis = M("diagnosis")->select();
        $this->assign("listDiagnosis", $listDiagnosis);

        $department_id = $_SESSION["department_id"];
        $listDoctor = M("doctor")->where("department_id=$department_id")->select();
        $this->assign("listDoctor", $listDoctor);

        $this->assign("medical_id", $medical_id);
        $this->assign("name", $name);
        $this->assign("age", $age);
        $this->assign("sex", $sex);
        $this->assign("diagnosis_id", $diagnosis_id);
        $this->assign("doctor_id", $doctor_id);
        $this->assign("admission_time", $admission_time);
        $this->assign("department_name", $_SESSION["department_name"]);
        $this->assign("inpatient_area",  $_SESSION["inpatient_area"]);

        $listMedicine = M("medicine")->where("status='1'")->select();
        $this->assign("listMedicine", $listMedicine);
        $listMedicineUnit = M("medicine_unit")->where("status='1'")->select();
        $this->assign("listMedicineUnit", $listMedicineUnit);
        $listMedicineUsage = M("medicine_usage")->where("status='1'")->select();
        $this->assign("listMedicineUsage", $listMedicineUsage);
        $listMedicineFrequency = M("medicine_frequency")->where("status='1'")->select();
        $this->assign("listMedicineFrequency", $listMedicineFrequency);

        $listPatientMedication = M("patient_medication")->where("patient_id=$id")->select();
        $this->assign("listPatientMedication", $listPatientMedication);

        $this->assign("id_type", $this->id_type);
        $this->assign("operate", "查询");
        $this->assign("operate_url", __URL__. "/edit");
		$this->display("update");
    }
    public function edit() {
        $data = $this->getData();
        $patient_id  = $_SESSION["patient_id"];
        $medicineStr = $_POST["medicineStr"];
        unset($data["medicineStr"]);

        $medicineStrArray = explode(";", $medicineStr);

        $data["time_update"] = date('y-m-d H:i:s', time());
        $result = $this->m->where("id=$patient_id")->save($data);
        if ($result <= 0) {
            echo "0";
            return;
        }
        $medicine = array();
        foreach ($medicineStrArray as $value) {
            $itemArray = explode(",", $value);
            $item = array();
            $item["patient_id"]            = $patient_id;
            $item["medicine_id"]           = $itemArray[0];
            $item["medicine_frequency_id"] = $itemArray[1];
            $item["medicine_usage_id"]     = $itemArray[2];
            $item["medicine_dose"]         = $itemArray[3];
            $item["medicine_unit_id"]      = $itemArray[4];
            $item["begin_time"]            = $itemArray[5];
            $item["end_time"]              = $itemArray[6];
            $item["days"]                  = $itemArray[7];
            array_push($medicine, $item);
        }
        M("patient_medication")->where("patient_id=$patient_id")->delete();
        M("patient_medication")->addAll($medicine);

        echo "1";
    }   
    public function add() {
        $data = $this->getData();
        $medicineStr = $_POST["medicineStr"];
        unset($data["medicineStr"]);

        $medicineStrArray = explode(";", $medicineStr);
        $start = sizeof($data["id_number"]) - 6;
        $data["password"] = md5(substr($data["id_number"], $start, 6));
        $data["time_update"] = date('y-m-d H:i:s', time());
        $patient_id = $this->m->add($data);
        if ($patient_id <= 0) {
            echo "0";
            return;
        }
        $medicine = array();
        foreach ($medicineStrArray as $value) {
            $itemArray = explode(",", $value);
            $item = array();
            $item["patient_id"]            = $patient_id;
            $item["medicine_id"]           = $itemArray[0];
            $item["medicine_frequency_id"] = $itemArray[1];
            $item["medicine_usage_id"]     = $itemArray[2];
            $item["medicine_dose"]         = $itemArray[3];
            $item["medicine_unit_id"]      = $itemArray[4];
            $item["begin_time"]            = $itemArray[5];
            $item["end_time"]              = $itemArray[6];
            $item["days"]                  = $itemArray[7];
            array_push($medicine, $item);
        }
        M("patient_medication")->where("patient_id=$patient_id")->delete();
        M("patient_medication")->addAll($medicine);

        echo "1";
    }   
    public function resetPassword(){
        $id  = $_POST["id"];
        $sql = "update __TABLE__ set password=md5(right(id_number, 6)) where id=$id";
        //echo $sql;
        $this->m->execute($sql);
        echo mysql_affected_rows();
    }
}
?>
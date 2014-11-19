<?php
class FollowUpAction extends GlobalAction{
    public $filesUpload;
    public $dir;
    public function __construct() {  
        parent::__construct(); 
        $this->m     = M("follow_up"); 
        $this->table = "follow_up"; 
        $this->permissionType  = "4";
        $this->dir = APP_PATH."upload/followUpAttachment";
    }
    public function index(){
        if ($this->isPermitted()) {            
            if ($_SESSION['userType'] == "p") {
                $patient_id = $_SESSION["user_id"];
                $sql  = "select id, create_time, status, case status when '1' then '已阅' when '0' then '未阅' end as status_val ";
                $sql .= "from follow_up where status>='0' and patient_id=$patient_id order by create_time desc ";
            } else if ($_SESSION['userType'] == "d") {
                $sql  = "select d.name as diagnosis, p.name, p.medical_id, f.id, f.create_time, f.status, case f.status when '1' then '已阅' when '0' then '未阅' end as status_val ";
                $sql .= "from follow_up f, patient p, diagnosis d where p.diagnosis_id=d.id and p.id=f.patient_id and f.status>='0' ";
                if (isset($_POST["medical_id"]) && ($medical_id = $_POST["medical_id"]) != "") {
                    $sql .= "and p.medical_id=$medical_id ";
                }
                if (isset($_POST["name"]) && ($name = $_POST["name"]) != "") {
                    $sql .= "and p.name='$name' ";
                }
                if (isset($_POST["diagnosis_id"]) && ($diagnosis_id = $_POST["diagnosis_id"]) != "") {
                    $sql .= "and p.diagnosis_id=$diagnosis_id ";
                }
                if (isset($_POST["status"]) && ($status = $_POST["status"]) != "") {
                    $sql .= "and f.status=$status ";
                }
                if (isset($_POST["create_time"]) && ($create_time = $_POST["create_time"]) != "") {
                    $sql .= "and f.create_time like '$create_time%' ";
                }
                $sql .= "order by f.create_time desc ";
                $this->assign("medical_id", $medical_id);
                $this->assign("name", $name);
                $this->assign("diagnosis_id", $diagnosis_id);
                $this->assign("status", $status);
                $this->assign("create_time", $create_time);
            }
            $list = $this->m->query($sql);
            $count = sizeof($list);
            $page  = new Page($count, 15);
            $sqlLimit = "limit $page->firstRow, $page->listRows";
            $list = $this->m->query($sql. $sqlLimit);
            $show  = $page->show();
            $this->assign("pageShow", $show);
            $listDiagnosis = M("diagnosis")->select();
            $this->assign("list", $list);
            $this->assign("listDiagnosis", $listDiagnosis);
            $this->display();
        }
    }
    public function upload() {
        $id = $_POST["tr_id"];
        $r = parent::upload("followUpAttachment");
        if (!$r){
        } else {
            $fullName = $r['savename'];
            $name = substr($fullName, 0, strpos($fullName, "."));
            $ext  = $r['extension'];
            $_SESSION['filesUpload']["$id"] = "$name/$ext";
            $html = "<a href='". __URL__. "/download/$name/$ext'>下载查看</a>";
            echo "<script>";
            echo "$(window.parent.document).find('#$id').find('.td_file').html(\"". $html. "\");";
            echo "</script>";
        }
    }
    public function download(){
        $fileName = $_GET["_URL_"][2];
        $ext      = $_GET["_URL_"][3];
        $file = "$fileName.$ext";
        parent::download($this->dir, $file);
    }
    public function removeAttachment() {
        if ($this->isPermitted()) {
            $key  = $_POST["tr_id"];
            $val  = $_SESSION['filesUpload']["$key"];
            $fullName = str_replace("/", ".", $val);            
            unset($_SESSION['filesUpload']["$key"]);
            $file = "$this->dir/$fullName";
            unlink($file);
            echo "1";
        } else {
            echo "-1";
        }
    }
    public function addInput() {
        $this->permissionType  = "3";
        $_SESSION['filesUpload'] = array();
        $patient_id = $_SESSION['user_id'];
        $sql  = "select p.name, p.medical_id, d.name as diagnosis_name, dd.name as department_name ";
        $sql .= "from patient p, diagnosis d, department dd ";
        $sql .= "where p.diagnosis_id=d.id and dd.id=d.department_id and p.id=$patient_id";
        $patient = M("patient")->query($sql);
        $this->assign("patient", $patient[0]);
        $listMedicine = M("medicine")->where("status='1'")->select();
        $this->assign("listMedicine", $listMedicine);
        $listMedicineUnit = M("medicine_unit")->where("status='1'")->select();
        $this->assign("listMedicineUnit", $listMedicineUnit);
        $listMedicineUsage = M("medicine_usage")->where("status='1'")->select();
        $this->assign("listMedicineUsage", $listMedicineUsage);
        $listMedicineFrequency = M("medicine_frequency")->where("status='1'")->select();
        $this->assign("listMedicineFrequency", $listMedicineFrequency);
        $listFollowUpAttachmentType = M("follow_up_attachment_type")->where("status='1'")->select();
        $this->assign("listFollowUpAttachmentType", $listFollowUpAttachmentType);
        parent::addInput();
    }
    public function add(){
        if ($this->isPermitted()) {
            $data = array();
            $data["patient_id"]  = $_SESSION["user_id"];
            $data["description"] = $_POST["description"];
            $data["expectation"] = $_POST["expectation"];
            $data["create_time"] = date('y-m-d H:i:s', time());
            $medicineStr   = $_POST["medicineStr"];
            $attachmentStr = $_POST["attachmentStr"];

            $medicineStrArray = explode(";", $medicineStr);
            $attachmentStrArray = explode(";", $attachmentStr);

            $follow_up_id = $this->m->add($data);
            if ($follow_up_id <= 0) {
                echo "0";
                return;
            }
            $medicine = array();
            foreach ($medicineStrArray as $value) {
                $itemArray = explode(",", $value);
                $item = array();
                $item["follow_up_id"]          = $follow_up_id;
                $item["medicine_id"]           = $itemArray[0];
                $item["medicine_frequency_id"] = $itemArray[1];
                $item["medicine_usage_id"]     = $itemArray[2];
                $item["medicine_dose"]         = $itemArray[3];
                $item["medicine_unit_id"]      = $itemArray[4];
                $item["begin_time"]            = $itemArray[5];
                $item["end_time"]              = $itemArray[6];
                array_push($medicine, $item);
            }
            M("follow_up_medication")->addAll($medicine);
            $attachment = array();
            foreach ($attachmentStrArray as $value) {
                if ($value != "") {
                    $itemArray = explode(",", $value);
                    $tr_id = $itemArray[0];
                    if (array_key_exists($tr_id, $_SESSION["filesUpload"])) {
                        $item = array();
                        $item["follow_up_id"]       = $follow_up_id;
                        $item["file_name"]          = $_SESSION["filesUpload"]["$tr_id"];
                        $item["attachment_type_id"] = $itemArray["1"];
                        $item["description"]        = $itemArray["2"];
                        array_push($attachment, $item);
                    }
                }
            }
            M("follow_up_attachment")->addAll($attachment);
            echo "1";
        } else {
            echo "-1";
        }
    }
    public function view() {
        if ($this->isPermitted()) {
            $follow_up_id = $_GET["_URL_"][2];
             
            $sql  = "select p.name as patient_name, p.medical_id, d.name as diagnosis_name, dd.name as department_name, f.*, ";
            $sql .= "case f.status when '1' then '已阅' when '0' then '未阅' end as status_val ";
            $sql .= "from patient p, diagnosis d, department dd, follow_up f ";
            $sql .= "where p.diagnosis_id=d.id and dd.id=d.department_id and f.patient_id=p.id and f.id=$follow_up_id ";
            if ($_SESSION["userType"] == "p") {
                $user_id = $_SESSION["user_id"];
                $sql .= "and patient_id=$user_id ";
            } 
            $datas = M()->query($sql);
            $follow_up  = $datas[0];
            $doctor_id = $follow_up['check_doctor_id'];
            $follow_up["doctor_name"] = M("doctor")->where("id=$doctor_id")->getField("name");

            $sql  = "select a.*, t.name as attachment_type_name from follow_up_attachment a, follow_up_attachment_type t ";
            $sql .= "where a.follow_up_id=$follow_up_id and t.id=a.attachment_type_id ";
            $attachment = M()->query($sql);

            $sql  = "select fm.*, m.name as medicine_name, u.value as usage_value, f.value as frequency_value, un.name as unit_name ";
            $sql .= "from follow_up_medication fm, medicine m, medicine_usage u, medicine_frequency f, medicine_unit un ";
            $sql .= "where fm.medicine_id=m.id and fm.medicine_usage_id=u.id and fm.medicine_frequency_id=f.id and fm.medicine_usage_id=un.id ";
            $sql .= "and fm.follow_up_id=$follow_up_id";    
            $medicine = M()->query($sql);

            if ($_SESSION["userType"] == "d") {
                $data["status"] = "1";
                $this->m->where("id=$follow_up_id")->save($data);
            }
            $_SESSION['follow_up_id'] = $follow_up_id;
            $this->assign("follow_up",  $follow_up);
            $this->assign("listAttachment", $attachment);
            $this->assign("listMedicine",   $medicine);
            $this->display();
        }
    }
    public function check() {
        $this->permissionType  = "2";
        if ($this->isPermitted()) {
            $data = $this->getData();
            $data["check_doctor_id"] = $_SESSION["user_id"];
            $id = $_SESSION["follow_up_id"];
            echo $this->m->where("id=$id")->save($data);
        }
    }
    public function remove(){
        if ($this->isPermitted()) {
            $follow_up_id = $_POST["id"];
            if ($_SESSION["userType"] == "p") {
                $patient_id = $_SESSION["user_id"];
                $flag = $this->m->where("id=$follow_up_id and patient_id=$patient_id")->delete();
            } else {
                $flag = $this->m->where("id=$follow_up_id")->delete();
            }
            if ($flag > 0) {
                $files = M()->query("select file_name from follow_up_attachment where follow_up_id=$follow_up_id");
                foreach ($files as $value) {
                    $file_path = APP_PATH."upload/followUpAttachment/". str_replace("/", ".", $value["file_name"]);
                    unlink($file_path);
                }
                M()->execute("delete from follow_up_attachment where follow_up_id=$follow_up_id");
                M()->execute("delete from follow_up_medication where follow_up_id=$follow_up_id");
                echo "1";
            } else {
                echo "-1";
            }
        }
    }
}
?>
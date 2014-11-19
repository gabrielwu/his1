<?php
class UserAction extends GlobalAction{
    public function login(){
        $userType = isset($_GET["_URL_"][2]) ? $_GET["_URL_"][2] : $this->_param('userType');
        $usernameTitle = "用户名：";
        $passwordTitle = "密 码：";
        $this->assign("usernameTitle", $usernameTitle. "病历号");
        $this->assign("passwordTitle", $passwordTitle. "初始为身份证号后6位");
        switch ($userType) {
            case 'p':
                break;
            case 'd':
                $this->assign("usernameTitle", $usernameTitle. "工号");
                $this->assign("passwordTitle", $passwordTitle. "初始为工号");
                break;
            case 'a':
                $this->assign("usernameTitle", $usernameTitle);
                $this->assign("passwordTitle", $passwordTitle);
                break;
            default:
                break;
        }
        $this->assign("userType",   $userType);
        $this->assign("userTypeCn", $this->userTypesCn["$userType"]);
        $this->display("login");
    }
    public function changePassword(){
        $this->display();
    }
    public function updatePassword(){
        $user_id  = $_SESSION['user_id'];
        $userType = $_SESSION['userType'];
        $passwordOld = $_POST["passwordOld"];
        $passwordNew = $_POST["passwordNew"];
        $passwordRe  = $_POST["passwordRe"];
        if ($passwordRe != $passwordNew) {
            echo "0";
            return ;
        }
        if ($passwordNew == "") {
            echo "-1";
            return ;
        }
        switch ($userType) {
            case 'p':
                $m = M("patient");
                break;
            case 'd':
                $m = M("doctor");
                break;
            case 'a':
                $m = M("admin");
                break;
        }
        $password = $m->where("id='$user_id'")->getField("password");
        if (md5($passwordOld) != $password) {
            echo "3";
        } else {
            $data = array();
            $data['password'] = md5($passwordNew);
            if ($m->where("id=$user_id")->save($data)) {
                echo "1";
            } else {
                echo "2";
            }
        }
    }
    public function loginCheck() {
        $input_username = $_POST["username"];
        $input_password = $_POST["password"];
        $userType       = $_POST["userType"];
        $loginerror     = true;
        $adminType      = "-1";
        $department_id  = "0";
        $department_name= "";
        switch ($userType) {
            case 'p':
                $m = M("patient");
                $user_id   = $m->where("medical_id='$input_username'")->getField("id");
                $password  = $m->where("medical_id='$input_username'")->getField("password");
                $user_name = $m->where("medical_id='$input_username'")->getField("name");
                $department_id  = $m->where("medical_id='$input_username'")->getField("department_id");
                $inpatient_area_id = M("department")->where("id='$department_id'")->getField("inpatient_area_id");
                $inpatient_area = M("inpatient_area")->where("id='$inpatient_area_id'")->select();
                break;
            case 'd':
                $m = M("doctor");
                $user_id   = $m->where("job_id='$input_username'")->getField("id");
                $password  = $m->where("job_id='$input_username'")->getField("password");
                $user_name = $m->where("job_id='$input_username'")->getField("name");
                $department_id = $m->where("job_id='$input_username'")->getField("department_id");
                $inpatient_area_id = M("department")->where("id='$department_id'")->getField("inpatient_area_id");
                $inpatient_area = M("inpatient_area")->where("id='$inpatient_area_id'")->select();
                break;
            case 'a':
                $m = M("admin");
                $user_id   = $m->where("username='$input_username'")->getField("id");
                $password  = $m->where("username='$input_username'")->getField("password");
                $adminType = $m->where("username='$input_username'")->getField("department_id");
                $department_id = $m->where("username='$input_username'")->getField("department_id");
                $inpatient_area_id = M("department")->where("id='$department_id'")->getField("inpatient_area_id");
                $inpatient_area = M("inpatient_area")->where("id='$inpatient_area_id'")->select();
                $user_name = $input_username;
                break;
        }
        if (md5($input_password) == $password) {
            $_SESSION['user_id']   = $user_id;
            $_SESSION['username']  = $input_username;
            $_SESSION['userType']  = $userType;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['adminType'] = $adminType;
            $_SESSION['department_id'] = $department_id;
            $_SESSION['inpatient_area'] = $inpatient_area[0];
            $loginerror = false;
        } 
        if ($loginerror) {
            $this->assign("errorTip", "用户名或密码错误！");
            $this->login();
        } else {
            header("location: /" . APP_NAME . "/index.php/user/index");
        }

    }
    public function index() {
        $this->display("index");
    }
    public function top() {
        $userType   = $_SESSION['userType'];
        $adminType  = $_SESSION['adminType'];
        $department_id  = $_SESSION['department_id'];
        $department_name = M("department")->where("id='$department_id'")->getField("name");
        $_SESSION["department_name"] = $department_name;
        $this->assign("userType",   $userType);
        $this->assign("department_name", $department_name);
        $this->assign("userTypeCn", $this->userTypesCn["$userType"]);
        $this->assign("user_name",  $_SESSION["user_name"]);
        $this->display();
    }
    public function bottom() {
        $this->display();
    }
    public function left() {
        $this->assign("userType",  $_SESSION['userType']);
        $this->assign("adminType", $_SESSION['adminType']);
        $this->display();
    }
    // TODO
    public function right(){
    }
    public function denied() {
        $this->display();
    }
    public function logout(){
        $userType = $_SESSION['userType'];
        echo $userType;
        echo $_SESSION['username'];
        $_SESSION = array();
        echo $_SESSION['username'];
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        unset($_SESSION);
    	session_destroy();
        $moduleName = strtolower(MODULE_NAME);
        header("location: " . __URL__ . "/login/$userType");
        exit;
    }
}
?>
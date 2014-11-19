<?php
class GlobalAction extends Action{
    public $userTypesEn;
    public $userTypesCn;
    public $m; 
    public $table;
    public $id_type;
    public $permissionType;
    public $root;

    public function __construct() {  
	    parent::__construct();  
        import("ORG.Util.Page");
        $this->root = "/". APP_NAME. "/index.php";
        $this->assign("url",        __URL__);
        $this->assign("root", $this->root);
        $this->assign("css",  $this->css());
        $this->assign("js",   $this->js());
    }  
    public function css() {
        $dir  = "/". APP_NAME. "/media";
        $str  = "";
        $str .= "<link rel='stylesheet' type='text/css' href='$dir/css/main.css' />";
        $str .= "<link rel='stylesheet' type='text/css' href='$dir/css/index.css' />";
        $str .= "<link rel='stylesheet' type='text/css' href='$dir/css/right.css' />";
        $str .= "<link rel='stylesheet' type='text/css' href='$dir/jquery-ui/jquery-ui.min.css' />";
        return $str;
    }
    public function js() {
        $dir  = "/". APP_NAME. "/media";
        $str  = "";
        $str .= "<script type='text/javascript' language='javascript' src='$dir/js/jquery-2.0.3.min.js'></script>";
        $str .= "<script type='text/javascript' language='javascript' src='$dir/js/common.js'></script>";
        $str .= "<script type='text/javascript' language='javascript' src='$dir/jquery-ui/jquery-ui.min.js'></script>";
        return $str;
    }
    public function _initialize(){
        session_start();
        $isQuotesOn = get_magic_quotes_gpc();
        $exp = "/select|or|drop|delete|alter|update|insert/";
        foreach ($_REQUEST as &$value) {
            if (preg_match($exp, $value) > 0) exit();
            $value = $isQuotesOn ? $value : addslashes($value);
        }
        $user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        $actionName = strtolower(ACTION_NAME);
        $moduleName = strtolower(MODULE_NAME);
        //echo $user;
        if (empty($user)) {
            if (!in_array("$moduleName/$actionName", array("user/logincheck", "user/logout", "user/login"))) {
                header("location: /" . APP_NAME . "/index.php/user/login/p");
                //echo $this->root;
                exit;
            } 
        }
        $this->assign("userType", $_SESSION['userType']);
        $this->userTypesEn = array('p' => 'patient', 'd' => 'doctor', 'a' => 'admin');
        $this->userTypesCn = array('p' => '患者',     'd' => '医生',    'a' => '管理员');
        $this->id_type = array("身份证", "士官证", "驾驶证", "护照", "港澳通行证");
        header("Content-Type:text/html; charset=utf-8");
    }
    function isPermitted(){
        /* $type
         * 0：系统管理员
         * 1：科室管理员
         * 2：医生
         * 3：患者
         * 4：医生患者
        */
        // TODO
        switch ($this->permissionType) {
            case "0":
                if ($_SESSION['adminType'] == "0") {
                    return true;
                }
                break;
            case "1":
                if ($_SESSION['adminType'] > "0") {
                    return true;
                }
                break;
            case "2":
                if ($_SESSION['userType'] == "d") {
                    return true;
                }
                break;
            case "3":
                if ($_SESSION['userType'] == "p") {
                    return true;
                }
                break;
            case "4":
                if ($_SESSION['adminType'] < "0") {
                    return true;
                }
                break;
            
            default:
                break;
        }
        $this->redirect("User/denied", "", 0, "");
    }
    public function index(){
        if ($this->isPermitted()) {
            $list = $this->m->select();
            $this->assign("list", $list);
            $this->display();
        }
    }
    public function addInput() {
        if ($this->isPermitted()) {
            $this->display("update");
        } 
    }
    public function add(){
        if ($this->isPermitted()) {
            $data = $this->getData();
            echo $this->m->add($data) > 0 ? 1 : 0;
        } 
    }
    public function edit(){
        if ($this->isPermitted()) {
            $id   = $_POST["id"];
            $data = $this->getData();
            echo $this->m->where("id=$id")->save($data);
        } 
    }
    public function remove(){
        if ($this->isPermitted()) {
            $id = $_POST["id"];
            echo $this->m->where("id=$id")->delete();
        } 
    }
    public function getData() {
        return $_POST;
    }
    public function upload($dir) {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = 1024 * 1024 * 20;
        $upload->allowExts = array("jpeg","jpg","png","pdf");
        $upload->uploadReplace = true;
        if (!$upload->upload(APP_PATH."/upload/$dir/")){
            $this->error($upload->getErrorMsg());
            return false;
        } else {
            $info = $upload->getUploadFileInfo();
            $file = $info[0];
            echo $this->js();
            return $file;
        }
    }
    public function download($dir, $fileName) {
        $file = "$dir/$fileName";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}
?>
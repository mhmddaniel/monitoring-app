<?php
class API extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_padmin');
    }

    function index(){
        $var = "Aplication Programming Interface Aplikasi Pengendalian Project";
        echo json_encode($var) ;
    }

    function tryLogin(){

        if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // receiving the post params
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $username="adds";//strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        // $password="123";//strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));

        //$username = $_POST['username'];
        //$password = $_POST['password'];
        $cadmin=$this->m_padmin->cekadminlogin($username,$password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();

            $newdata['error'] = FALSE;
            $newdata['user'] = $xcadmin;
            $newdata['logged_in'] = TRUE;

            echo json_encode($newdata);
        }else{
            $newdata['error'] = TRUE;
            $newdata['error_msg'] = "Username atau Password anda salah";
            $newdata['logged_in'] = FALSE;

            echo json_encode($newdata);
        }
    }
    else
    {
            $newdata['error'] = TRUE;
            $newdata['error_msg'] = "Inputan Gagal";
            $newdata['logged_in'] = FALSE;

            echo json_encode($newdata);
    }

    }

    function testLogin(){
 
    // receiving the post params
        //$username = $_POST['username'];
        //$password = $_POST['password'];
        $username="ads";//strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
         $password="123";//strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));

        //$username = $_POST['username'];
        //$password = $_POST['password'];
        $cadmin=$this->m_padmin->cekadminlogin($username,$password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();

            $newdata['error'] = FALSE;
            $newdata['user'] = $xcadmin;
            $newdata['logged_in'] = TRUE;

            echo json_encode($newdata);
        }else{
            $newdata['error'] = TRUE;
            $newdata['error_msg'] = "Username atau Password anda salah";
            $newdata['logged_in'] = FALSE;

            echo json_encode($newdata);
        }
    }

    function fetchUserData()
    {

    }
}
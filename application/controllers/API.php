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
            $cadmin=$this->m_padmin->cekadmin($username);
            if($cadmin->num_rows() > 0){
                $cadmin=$this->m_padmin->cekadminlogin($username,$password);
                if($cadmin->num_rows() > 0){
                    $xcadmin=$cadmin->row_array();

                    $newdata['error'] = FALSE;
                    $newdata['user'] = $xcadmin;
                    $newdata['logged_in'] = TRUE;

                    echo json_encode($newdata);
                }else{
                    $newdata['error'] = TRUE;
                    $newdata['error_msg'] = "Password anda salah";
                    $newdata['logged_in'] = FALSE;

                    echo json_encode($newdata);
                }
            }else{
                $newdata['error'] = TRUE;
                $newdata['error_msg'] = "User tidak terdaftar";
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
        $username="deya";//strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
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

    

    function fetchProject()
    {
        if (isset($_POST['user_bagian'])) {

            $bagian = $_POST['user_bagian'];
            $project=$this->m_padmin->get_all_proyek_by_bagian("ciptakarya");
            if($project->num_rows() > 0){
                $xcadmin=$project->row_array();

                $newdata['error'] = FALSE;
                $newdata['project'] = $project->result_array();
                $newdata['fetched'] = TRUE;

                echo json_encode($newdata);
            }else{
                $newdata['error'] = TRUE;
                $newdata['error_msg'] = "Tidak ada data proyek untuk pengguna ini";
                $newdata['fetched'] = FALSE;

                echo json_encode($newdata);
            }
        }
        else
        {
            $newdata['error'] = TRUE;
            $newdata['error_msg'] = "Gagal menghubungkan ke server";
            $newdata['fetched'] = FALSE;

            echo json_encode($newdata);
        }

    }

    function fetchProjectData()
    {
        if (isset($_POST['kode'])) {

            $kode = $_POST['kode'];
            $project=$this->m_padmin->get_detail_proyek_by_kode($kode);
            if($project->num_rows() > 0){
                $xcadmin=$project->row_array();

                $detail = $this->m_padmin->get_penannggung_jawab($kode);

                $newdata['error'] = FALSE;
                $newdata['project'] = $project->result_array();
                $newdata['detail'] = $detail->result_array();
                $newdata['fetched'] = TRUE;

                echo json_encode($newdata);
            }else{
                $newdata['error'] = TRUE;
                $newdata['error_msg'] = "Tidak ada data untuk proyek ini";
                $newdata['fetched'] = FALSE;

                echo json_encode($newdata);
            }
        }
        else
        {
            $newdata['error'] = TRUE;
            $newdata['error_msg'] = "Gagal menghubungkan ke server";
            $newdata['fetched'] = FALSE;

            echo json_encode($newdata);
        }
    }
    function doUpload()
    {
        $config['upload_path']         = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $error['upload_path'] = $config['upload_path'];
            echo json_encode($error);
        }
        else
        {
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $insert['proyek_id'] = $_POST['project_id'];
            $insert['file_data'] = $upload_data['file_name'];
            $insert['file_jenis'] = "foto";
            $this->m_padmin->insert_image($insert);
            $data = array('upload_data' => $this->upload->data());
            echo json_encode($data);
        }
    }
    function getAllImagesForProject()
    {

        if (isset($_POST['kode'])) {

            $kode = $_POST['kode'];
            $images = $this->m_padmin->get_all_images_by_kode($kode);
            if($images->num_rows() > 0){
                $datas = $images->result_array();
                $results = array();

                foreach ($datas as $data) {
                    $name=$data['file_data'];
                    $url['small'] = "http://ppp.kebkel.com/assets/images/" . $data['file_data'];
                    $url['medium'] = "http://ppp.kebkel.com/assets/images/" . $data['file_data'];
                    $url['large'] = "http://ppp.kebkel.com/assets/images/" . $data['file_data'];
                    $timestamp = date("D M d, Y G:i");

                    $result['name']=$name;
                    $result['url']=$url;
                    $result['timestamp']=$timestamp;
                    
                array_push($results, $result);
                }

                $var["images"] = $results;

                echo json_encode($var);
            }else{
                $newdata['error'] = TRUE;
                $newdata['error_msg'] = "Tidak ada gambar untuk proyek ini";
                $newdata['fetched'] = FALSE;

                echo json_encode($newdata);
            }
        }
        else
        {
            $newdata['error'] = TRUE;
            $newdata['error_msg'] = "Gagal menghubungkan ke server";
            $newdata['fetched'] = FALSE;

            echo json_encode($newdata);
        }
    }
}
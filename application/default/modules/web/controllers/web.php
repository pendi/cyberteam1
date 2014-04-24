<?php
/**
 * Description of web *
 * @author generator
 */

class web extends app_crud_controller {

	function __construct() {
		parent::__construct();
		$this->_layout_view = 'layouts/web';
        $this->_validation = array(
            'signup' => array(
                'email' => array('required'),
                'first_name' => array('required'),
                'last_name' => array('required'),
                'username' => array('required'),
                'password' => array('required'),
            ),
        );
    }

    function _check_access() {
        return TRUE;
    }

    function cek_user(){
        $sess_user = @$_SESSION['UserFB'];
        if(isset($sess_user)){
            $user_existing = $this->db->query("SELECT * FROM user WHERE status !=0 AND sso_facebook = ? ", array($sess_user['id']))->row_array();

            if(empty($user_existing)){
                redirect(site_url('web/x'));
            }else{
                $quser = $this->db->query("SELECT * FROM user WHERE status !=0 AND id = ? ", array($user_existing['id']))->row_array();
                $this->_data['quser'] = $quser;
                $this->_data['user'] = $quser;
            }
            $this->_data['sess_user'] = $sess_user;
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url());
    }

    function index($param=null){
        $this->_layout_view = 'layouts/web';
        $this->load->helper('format');
        $this->load->helper('security');
        $this->_data['err_string'] = '';
        $films = $this->db->query("SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY created_time DESC LIMIT 10 ")->result_array();
        $film_rev = $this->db->query("SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY RAND() DESC LIMIT 3")->result_array();
        $film_pop = $this->db->query("SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY rate DESC LIMIT 4")->result_array();
        $this->_data['film_pop'] = $film_pop;
        $this->_data['film_rev'] = $film_rev;
        $this->_data['films'] = $films;
        if(!empty($param)){
            $this->_data['param'] = $param;
        }
        $this->cek_user();
    }

    function category(){

        $category_film = $this->db->query("SELECT * FROM category")->result_array();
        $this->_data['category_film'] = $category_film;

    }

    function cat_list($id=null, $offset=0){
        $this->load->library('pagination');
        $category = $this->db->query('SELECT * FROM category WHERE id = ?',array(intval($id)))->result_array();
        $this->_data['category'] = $category;

        $countfilm = $this->db->query('SELECT count(*) AS count FROM film WHERE category_id = ? AND status !=0 AND publish=1',array(intval($id)))->result_array();
        $film = $this->db->query('SELECT * FROM film WHERE category_id = ? AND status !=0 AND publish=1 ORDER BY created_time DESC LIMIT ?,?', array(intval($id), intval($offset), 8))->result_array();
        $this->_data['film'] = $film;
        $count = $countfilm[0]['count'];

        $config['base_url'] = site_url('web/cat_list/'.$id);
        $config['total_rows'] = $count;
        $config['per_page'] = 8;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);
        $this->cek_user();
    }


    function request_movie($offset=0){
        $this->cek_user();
        $this->load->library('pagination');
        $this->load->helper('format');
        $user = $this->auth->get_user();

        $_request = $this->db->query("SELECT * FROM request WHERE status !=0 ORDER BY created_time DESC")->result_array();
        $sql = "SELECT * FROM request WHERE status !=0 ORDER BY created_time DESC LIMIT ?,?";
        $request = $this->db->query($sql, array(intval($offset), 5))->result_array();
        $this->_data['request'] = $request;
        $count = count($_request);

        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    // $_POST['user_id'] = $user['id'];
            // xlog($_POST);exit;
                    $new_id = $this->_model('request')->save($_POST);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        add_info(l('Request Added'));
                        redirect(site_url('web/request_movie'));
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        }

        $config['base_url'] = site_url('web/request_movie/');
        $config['total_rows'] = $count;
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
    }

    function detail_film($id=null, $offset=0, $rate=null){
        $this->cek_user();
        $this->load->library('pagination');
        $this->load->helper('format');
        $film = $this->_model('film')->get($id);
        $this->_data['film'] = $film;
        $this->_data['offset'] = $offset;
        $user = $this->auth->get_user();
        // xlog($user);exit;

        if (!empty($rate)) {
            $this->db->query("UPDATE film set rate = (rate+1) where id=? LIMIT 1", array(intval($id)));
            redirect(site_url('web/detail_film').'/'.$id);
        } else {
            if (!empty($id)) {
                $id = $this->uri->segment(3);
                $this->_data['id'] = $id;
            }
        }
        $_comment = $this->db->query("SELECT * FROM comment WHERE  film_id = ? AND status !=0 ORDER BY created_time DESC",array(intval($id)))->result_array();
        $sql = "SELECT * FROM comment WHERE film_id = ? AND status !=0 ORDER BY created_time DESC LIMIT ?,?";
        $comment = $this->db->query($sql, array(intval($id),intval($offset), 5))->result_array();
        $this->_data['comment'] = $comment;
        $count = count($_comment);

        if ($_POST) {
            // var_dump($_POST);exit;
            // xlog($_POST);exit;
            if (trim($_POST['user_id'])) {
                    $_POST['film_id'] = $film['id'];
                    $new_id = $this->_model('comment')->save($_POST);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        add_info(l('Comment Added'));
                        redirect(site_url('web/detail_film'.'/'.$id));
                        exit;
                    }
            } else {
                add_error(l('You Must Login To Add Comment !!!'));
                redirect(site_url('web/detail_film'.'/'.$id));
            }
        }

        $config['base_url'] = site_url('web/detail_film'.'/'.$id);
        $config['total_rows'] = $count;
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);
    }

    function detail_user($id=null){
        $this->cek_user();
        $user = $this->_model('user')->get($id);
        $this->_data['user'] = $user;
    }

    function signup($id=null){

        $model = $this->_model('user');
        if(isset($_SESSION['UserFB'])){
            $this->_data['sess_user'] = $_SESSION['UserFB'];
        }

        if ($_POST || $_FILES) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    $this->load->library('upload');
                    if (!empty($_FILES)) {
                        foreach ($_FILES as $key => $file) {
                            if ($file['error'] == 0) {
                                $config = array();
                                $config['upload_path'] = './data/user/';
                                $config['allowed_types'] = 'jpg|png|jpeg';
                                $config['encrypt_name'] = true;
                                $config['field'] = $key;

                                $this->upload->initialize($config);
                                if (!file_exists($config['upload_path'])) {
                                    mkdir($config['upload_path'], 0777, true);
                                }
                                $this->upload->do_upload($config['field']);

                                $upload_data = $this->upload->data();
                                $_POST[$key] = $upload_data[0]['file_name'];
                            }
                        }
                    }

                    $new_id = $this->_model('user')->save($_POST,$id);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        add_info(l('Register Success'));
                        redirect(site_url('web/index'));
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        } else {
            if (!empty($id)) {
                $id = $this->uri->segment(3);
                $this->_data['id'] = $id;
                $_POST = $model->get($id);
            }
        }
    }

    function list_movie($sort='latest',$offset=0){
        $this->cek_user();
        $this->load->library('pagination');
        $this->_layout_view = 'layouts/web';
        $this->load->helper('format');
        $this->load->helper('security');

        // sort by
        $order = 'created_time';
        $q = ' DESC';

        // if(isset($sort)){
            if ($sort == "az") {
                $order = 'title';
                $q = ' ASC';
            }
            if ($sort == "za") {
                $order = 'title';
                $q = ' DESC';
            }
            if ($sort == "quality") {
                $order = 'quality';
                $q = ' ASC';
            }
            if ($sort == "latest") {
                $order = 'created_time';
                $q = ' DESC';
            }
            if ($sort == "oldest") {
                $order = 'created_time';
                $q = ' ASC';
            }
            if ($sort == "rate") {
                $order = 'rate';
                $q = ' DESC';
            }
        // }

        $sql = "SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY ".$order.$q." LIMIT ?,?";
        $film = $this->db->query($sql, array(intval($offset), 8))->result_array();

        $countfilm = $this->db->query("SELECT count(*) as count FROM film WHERE status !=0 AND publish=1 ")->row_array();

        $this->_data['film'] = $film;
        $this->_data['sort'] = $sort;
        $count = $countfilm['count'];

        $config['base_url'] = site_url('web/list_movie/'.$sort);
        $config['total_rows'] = $count;
        $config['per_page'] = 8;
        $config['uri_segment'] = 4;

        $a = $this->pagination->initialize($config);
    }

    function search($offset = 0){
        $this->cek_user();
        $this->load->library('pagination');

        if($_POST){
            $wheres[] = "title LIKE '%" . $_POST['title']. "%'";
            $filter = ' WHERE '.implode(' AND ', $wheres);
            $this->session->set_userdata('filters',$filter);
        } else {
            $filter = $this->session->userdata('filters');
        }

        $count = 0;
        $this->_data['data'] = array();
        $this->_data['data']['items'] = $this->_model()->search($filter,8, $offset, $count);

        $this->pagination->initialize(array(
            'total_rows' => $count,
            'per_page' => 8,
            'uri_segment' => 3,
            'base_url' => site_url('web/search'),
        ));
    }

    function edit_profile($id = null){
        $this->cek_user();
        $this->load->helper('format');
        $user = $this->_model('user')->get($id);
        $this->_data['user'] = $user;

        $id = $user["id"];

        if ($id != null || $id != 1) {
            if ($_POST || $_FILES) {
                if ($this->_validate()) {
                    $this->db->trans_start();
                    try {

                        $this->load->library('upload');

                        if (!empty($_FILES)) {
                            foreach ($_FILES as $key => $file) {
                                if ($file['error'] == 0) {
                                    $config = array();
                                    $config['upload_path'] = './data/user/';
                                    $config['allowed_types'] = 'jpg|png|jpeg';
                                    $config['encrypt_name'] = true;
                                    $config['field'] = $key;

                                    $this->upload->initialize($config);
                                    if (!file_exists($config['upload_path'])) {
                                        mkdir($config['upload_path'], 0777, true);
                                    }
                                    $this->upload->do_upload($config['field']);

                                    $upload_data = $this->upload->data();
                                    $_POST[$key] = $upload_data[0]['file_name'];
                                }
                            }
                        }
                        $new_id = $this->_model('user')->save($_POST,$id);
                        if ($this->input->is_ajax_request()) {
                            echo true;
                            exit;
                        } else {
                            redirect(site_url('web/detail_user'.'/'.$user['id']));
                            exit;
                        }
                    } catch (Exception $e) {
                        $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                    }
                }
            } else {
                if (!empty($id)) {
                    $id = $this->uri->segment(3);
                    $this->_data['id'] = $id;
                }
            }

        } else {
            redirect (site_url ());
        }
    }

    function view_user($id=null){
        $user = $this->_model('user')->get($id);
        $this->_data['user'] = $user;
        $this->cek_user();
    }

    function login_fb(){
        require ARCHPATH.'/libraries/facebook.php';

        $this->config->load ("facebook");

        $config_fb['appId'] = $this->config->item('facebook_app_id');
        $config_fb['secret'] = $this->config->item('facebook_api_secret');
        $facebook = new Facebook($config_fb);

        //get the user facebook id
        $user = $facebook->getUser();

        if($user){
            try{
                //get the facebook user profile data
                $user_profile = $facebook->api('/me');
                $params = array('next' => site_url('web/logout'));
                //logout url
                $logout = $facebook->getLogoutUrl($params);
                $ses_user = $_SESSION['UserFB'] = $user_profile;
                $_SESSION['logout']=$logout;

                echo "<script>window.close();</script>";
                exit ();
            }catch(FacebookApiException $e){
                error_log($e);
                $user = NULL;
            }
        }

        if(empty($user)){
            // login url
            $loginurl = $facebook->getLoginUrl(array(
                'scope'         => 'email,read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
                'redirect_uri'  => site_url('web/login_fb'),
                'display'=>'popup'
            ));

            header('Location: '.$loginurl);
        }
        exit;
    }
}

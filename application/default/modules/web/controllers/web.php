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

    function index2(){
        redirect(site_url('web/index'));
    }

    function index($offset=0,$sort=null){

        if($sort == '1'){
            $order = 'title ASC';
        }elseif($sort == '2'){
            $order = 'title DESC';
        }elseif($sort == '5'){
            $order = 'quality ASC';
        }else{
            $order = 'created_time DESC';
        }
        $this->_layout_view = 'layouts/web';
        $this->load->helper('format');
        $this->load->helper('security');

        $film = $this->db->query("SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY created_time DESC LIMIT ?,? ", array(intval($offset), 20))->result_array();
        
        $this->_data['film'] = $film;
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
    }


    function request_movie($id=null){

        $this->load->helper('format');
        $request = $this->_model('request')->get($id);

        $user = $this->auth->get_user();
        $request = $this->db->query("SELECT * FROM request WHERE status !=0 ORDER BY created_time DESC")->result_array();
        $this->_data['request'] = $request;
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    $_POST['user_id'] = $user['id'];
                    $new_id = $this->_model('request')->save($_POST);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect(site_url());
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        }

    }

    function detail_film($id){

        $this->load->helper('format');
        $film = $this->_model('film')->get($id);
        $this->_data['film'] = $film;
    }

    function detail_user($id=null){

        // xlog($id);exit;
        $this->load->helper('format');
        $user = $this->_model('user')->get($id);
        $this->_data['user'] = $user;
    }

    function privacy(){


    }

    function signup($id=null){

        $model = $this->_model('user');


        if ($_POST || $_FILES) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {

                    $this->load->library('upload');

                    // // ngambil id role dari table role
                    // $sql = 'SELECT * FROM `role` WHERE name LIKE "member"';
                    // $member = $this->db->query($sql)->result_array();
                    // $_POST['roles'][] = $member[0]['id'];

                    // // $_POST['yahoo_id'] = NULL;
                    // // $_POST['google_id'] = NULL;

                    if (!empty($_FILES)) {
                        foreach ($_FILES as $key => $file) {
                            if ($file['error'] == 0) {

                                $config = array();
                                $config['upload_path'] = './data/user';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                $config['encrypt_name'] = true;
                                $config['field'] = 'image';
                                $this->upload->initialize($config);

                                if (!file_exists($config['upload_path'])) {
                                    mkdir($config['upload_path'], 0777, true);
                                }
                                $this->upload->do_upload($config['field']);
                                $upload_data = $this->upload->data();
                                $_POST[$key] = 'user/' . $upload_data[0]['file_name'];
                            }
                        }
                    }

                    $new_id = $this->_model('user')->save($_POST,$id);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect($this->_get_uri());
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

    function login($mode = '') {
        $this->load->helper('format');
        $this->load->helper('security');
        $this->_data['err_string'] = '';
        if ($_POST || !empty($mode)) {
            $is_login = $this->auth->login(($_POST) ? $_POST['login'] : '', ($_POST) ? $_POST['password'] : '', $mode);
            if ($is_login) {
                $this->_model('user')->add_trail('login');
                redirect(site_url('web/index/'));
            } else {
                $this->_data['err_string'] = '<h6>Username/email or password not found<span></h6>';
            }
        } else {
            $this->_model('user')->add_trail('logout');
            $this->auth->logout();
        }
    }

    function list_movie($offset=0){
        $this->load->library('pagination');
        $this->_layout_view = 'layouts/web';
        $this->load->helper('format');
        $this->load->helper('security');

        $countfilm = $this->db->query("SELECT count(*) as count FROM film WHERE status !=0 AND publish=1 ")->row_array();
        $film = $this->db->query("SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY created_time DESC LIMIT ?,? ", array(intval($offset), 8))->result_array();
        
        $this->_data['film'] = $film;
        $count = $countfilm['count'];

        $config['base_url'] = site_url('web/list_movie');
        $config['total_rows'] = $count;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $a = $this->pagination->initialize($config);
        // $film = $this->db->query("SELECT * FROM film WHERE status !=0 AND publish=1 ORDER BY created_time DESC LIMIT ?,? ", array(intval($offset), 10))->result_array();
        // $this->_data['film'] = $film;
    }

    function search($offset = 0){
        $this->load->library('session');
        $this->load->library('pagination');

        if($_POST){
            // if(!empty($_POST['title'])){
                
                $wheres[] = "title LIKE '%" . $_POST['title']. "%'";
            // }
            // xlog($_POST); xlog($wheres);exit;
            $filter = ' WHERE '.implode(' AND ', $wheres);
            $this->session->set_userdata('filters',$filter);
        } else {
            $filter = $this->session->userdata('filters');
        }
    
        $count = 0;
        $this->_data['data'] = array();
        $this->_data['data']['items'] = $this->_model()->search($filter, $this->pagination->per_page, $offset, $count);
        
        $this->load->library('pagination'); 
        $this->pagination->initialize(array(
            'total_rows' => $count,
            'per_page' => $this->pagination->per_page,
            'uri_segment' => 3,
            'base_url' => site_url('web/search'),
        ));   
    }
}

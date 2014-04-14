<?php

/**
 * app_crud_controller.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2011 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (dd/mm/yyyy hh:mm:ss) (author)
 * 2011/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */

if (!class_exists('app_crud_controller')) {

    class app_crud_controller extends crud_controller {
        
		function __construct() {
			parent::__construct();

			if ($this->session->userdata('user')) {
            redirect('login.php');
        }

			// $this->load->library('session');
			// lakukan pengecekan
			// $u = $this->auth->get_user();
			// xlog($u);
			// exit();
			// if($u){

			// 	$now = datetime();

			// 	if(($now - $sessionActivity) > 30menit){
			// 		redirect('user/logout');
			// 	}

			// 	$sessionActivity = $_SESSION['userActivity']  = datetime();
				// bikin untuk nandain dia lagi aktif

			// }
			// xlog($u);
	    }

    }

}

<?php 


/**
 * user.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2012/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (yyyy/mm/dd hh:mm:ss) (author)
 * 2012/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */

class user extends base_user_controller {
	function login($mode = '') {
        $this->_layout_view = 'layouts/web';
        if ($_POST || !empty($mode)) {

            $is_login = $this->auth->login(($_POST) ? $_POST['login'] : '', ($_POST) ? $_POST['password'] : '', $mode);

            if ($is_login) {
                add_info(l('Welcome'));
                redirect(site_url());
            } else {
                add_error(l('Username/email or password not found'));
                redirect(site_url('web/index'));
            }
        } else {
            $this->_model('user')->add_trail('logout');
            $this->auth->logout();
        }
    }
}
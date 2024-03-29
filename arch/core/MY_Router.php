<?php

/**
 * MY_Router.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
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

/**
 * Description of MY_Router
 *
 * @author jafar
 */
class MY_Router extends CI_Router {

    var $is_module = false;
    var $module_name;
    var $base_dir = APPPATH;
    
    function fetch_base_dir() {
        return $this->base_dir;
    }

    /**
     * Validates the supplied segments.  Attempts to determine the path to
     * the controller.
     *
     * @access	private
     * @param	array
     * @return	array
     */
    function _validate_request($segments) {
        if (count($segments) == 0) {
            return $segments;
        }

        // Does the requested controller exist in the root folder?
        if (file_exists(APPPATH . 'controllers/' . $segments[0] . '.php')) {
            return $segments;
        }
        
        // Is the controller in a sub-folder?
        if (is_dir(APPPATH . 'controllers/' . $segments[0])) {
            // Set the directory and remove it from the segment array
            $this->set_directory($segments[0]);
            $segments = array_slice($segments, 1);

            if (count($segments) > 0) {
                // Does the requested controller exist in the sub-folder?
                if (!file_exists(APPPATH . 'controllers/' . $this->fetch_directory() . $segments[0] . '.php')) {
                    show_404($this->fetch_directory() . $segments[0]);
                }
            } else {
                // Is the method being specified in the route?
                if (strpos($this->default_controller, '/') !== FALSE) {
                    $x = explode('/', $this->default_controller);

                    $this->set_class($x[0]);
                    $this->set_method($x[1]);
                } else {
                    $this->set_class($this->default_controller);
                    $this->set_method('index');
                }

                // Does the default controller exist in the sub-folder?
                if (!file_exists(APPPATH . 'controllers/' . $this->fetch_directory() . $this->default_controller . '.php')) {
                    $this->directory = '';
                    return array();
                }
            }

            return $segments;
        }

        /** REMARK: reekoheek add this * */
        // Does the requested controller exist in the root folder?
        if (file_exists(APPMODPATH . $segments[0] . '/controllers/' . $segments[0] . '.php')) {
            $this->module_name = $segments[0];
            $this->base_dir = APPMODPATH.$this->module_name.'/';
            $this->is_module = true;
            return $segments;
        } elseif (file_exists(ARCHMODPATH . $segments[0] . '/controllers/' . $segments[0] . '.php')) {
            $this->module_name = $segments[0];
            $this->base_dir = ARCHMODPATH.$this->module_name.'/';
            $this->is_module = true;
            return $segments;
        } elseif (file_exists(ARCHPATH . 'controllers/' . $segments[0] . '.php')) {
            $this->base_dir = ARCHPATH;
            return $segments;
        }

        /** REMARK: reekoheek add this * */
        // If we've gotten this far it means that the URI does not correlate to a valid
        // controller class.  We will now see if there is an override
        if (!empty($this->routes['404_override'])) {
            $x = explode('/', $this->routes['404_override']);

            $this->set_class($x[0]);
            $this->set_method(isset($x[1]) ? $x[1] : 'index');

            return $x;
        }


        // Nothing else to do at this point but show a 404
        show_404($segments[0]);
    }

}

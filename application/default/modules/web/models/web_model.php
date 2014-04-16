<?php
/**
 * Description of web_model
 *
 * @author generator
 */

class web_model extends app_base_model {

	function search($filter = null, $limit = null, $offset = null, &$count = 0) {
        $params = array();
        $limit_str = '';
        $wheres = array();
        
        $select_count = 'SELECT COUNT(*) count';
        $select = 'SELECT *';

        $wheres[] = 'status != 0';

        $sql = ' FROM film '.$filter;
        $count = $this->_db()->query($select_count.$sql, $params)->row()->count;

        if (!empty($limit)) {
            $limit_str = ' LIMIT ?, ?';
            $params[] = intval($offset);
            $params[] = intval($limit);
        }

        $result = $this->_db()->query($select.$sql.$limit_str, $params)->result_array();
        return $result;
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Session Class Extension
*/
class MY_Session extends CI_Session {
   /*
    * Do not update an existing session on ajax calls
    *
    * @access    public
    * @return    void
    */
    function sess_update() {
        if ( !isAjax() ){
            parent::sess_update();
        }
    }
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $title = 'NSCS UKI Tools Portal :: ';
	public $logged_in = FALSE;
	public $is_admin = FALSE;
	public $scripts = array();
	public $styles = array();
	public $show_toolbar = TRUE;
	public $active_top_nav = '';
	public $show_footer = TRUE;
	public $show_sidebar = TRUE;
	public $meta_description = 'Default Meta Data here.';
	public $body_class = 'page';
	    	

    function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()) $this->logged_in = TRUE;
        if($this->ion_auth->is_admin()) $this->is_admin = TRUE;
        if($this->ion_auth->user()->row()) $this->user = $this->ion_auth->user()->row();
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mrtg extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->template->load('base', 'mrtg');
    }

}
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Sop extends CI_Controller
{
	public function __construct()
   	{
      parent::__construct();
      $this->load->model('banner_model', 'banner', true);
      $this->load->model('posting_model', 'posting', true);
      $this->load->model('category_model', 'category', true);
   	}
   
   public function index()
   {
      $data['title'] = 'sop';
      $data['page'] = 'sop';
      $this->load->view('front/layouts/app', $data);
   }    
}
	
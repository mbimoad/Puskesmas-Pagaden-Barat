<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model2 extends CI_Model {

   protected $table = 'menu';

   public function getMenu(){
      $this->db->where('is_active', 'Y');
      return $this->db->get($this->table)->result();
   }

   public function getSubmenu($id){
      $this->db->select(['submenu.sub_title', 'submenu.sub_url', 'submenu.is_active']);
      $this->db->from('submenu');
      $this->db->join( $this->table, 'submenu.id_menu = menu.id');
      $this->db->where('submenu.id_menu', $id);
      $this->db->where('submenu.is_active', 'Y');
      return $this->db->get()->result();
   }

}

/* End of file Menu_model.php */

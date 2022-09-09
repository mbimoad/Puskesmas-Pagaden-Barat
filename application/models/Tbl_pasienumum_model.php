<?php



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pasienumum_model extends CI_Model
{

    public $table = 'tbl_pasienumum';
    public $id = 'no_rekamedis';
    public $order = 'DESC';


    function __construct() {
        parent::__construct();
    }
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function deletealldata() {
        $this->db->empty_table($this->table);
    }

    public function getAll() {
        $this->db->distinct();
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    // Ambil Nilai by date
    function get_between_data($limit, $start = 0, $awal = NULL, $akhir = NULL) {
        $this->db->distinct();
        $this->db->order_by($this->id, $this->order);
        $this->db->where('tanggal_pendaftaran >=', $awal);
        $this->db->where('tanggal_pendaftaran <=', $akhir);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // Ambil Data Berdasarkan Cari data
    public function getDataByFilter($query) {    
        $this->db->like('no_rekamedis', $query);
        $this->db->or_like('no_ktp', $query);
        $this->db->or_like('nama_pasien', $query);
        $this->db->or_like('ketpasien', $query);
        $this->db->or_like('bin_binti', $query);
        $this->db->or_like('jenis_kelamin', $query);
        $this->db->or_like('tanggal_lahir', $query);
        $this->db->or_like('tanggal_pendaftaran', $query);
        $this->db->or_like('alamat', $query);
        $this->db->or_like('rt_rw_lengkap', $query);
        $this->db->or_like('status_pasien', $query); 
        $this->db->from($this->table);
        $this->db->distinct();
        return $this->db->get()->result();
    }

    // Ambil Data Berdasarkan Range tanggal
    public function getDateByFilter($awal, $akhir) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('tanggal_pendaftaran >=', $awal);
        $this->db->where('tanggal_pendaftaran <=', $akhir);
        $this->db->distinct();
        return $this->db->get($this->table)->result();
    }

    // Get Total 
    function getTotalUMUM($q, $awal, $akhir) {
         // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal. Cari berdasarkan No ktp
        if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
            $this->db->where('status_pasien', 'UMUM')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('status_pasien', 'UMUM')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('status_pasien', 'UMUM');
        }
        return $this->db->count_all_results();
    }

    

    // Get Pasien Lama
    function getPasienLama($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
            $this->db->where('ketpasien', 'LAMA')->like('no_ktp', $q);
        
            
            

        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('ketpasien', 'LAMA')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('ketpasien', 'LAMA');
        }
        return $this->db->count_all_results();
    }

    function getPasienBaru($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
            $this->db->where('ketpasien', 'BARU')->like('no_ktp', $q);
            
    
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('ketpasien', 'BARU')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('ketpasien', 'BARU');
        }
        return $this->db->count_all_results();
    }



    function getPasienLaki($q = NULL, $awal = NULL, $akhir = NULL) {
            // Ambil Tabel
            $this->db->distinct();
            $this->db->from($this->table); 
            $cek_tanggal = ($awal <> '') && ($akhir <> '' );

            // Jika Yang diinput Data bukan tanggal
            if(($q <> '') && ($cek_tanggal <> 1) ) {
                // Query And didouble -> pada where
                $this->db->like('jenis_kelamin', 'L')->like('no_ktp', $q);
            // Jika yang diinput tanggal
            } else if(($q == '') && ($cek_tanggal == 1)) {
                $this->db->where('jenis_kelamin', 'L')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
            // Jika tidak ada yang diinput
            } else {
                $this->db->where('jenis_kelamin', 'L');
            }
            return $this->db->count_all_results();
    }

    function getPasienPerempuan($q = NULL, $awal = NULL, $akhir = NULL) {
          // Ambil Tabel
          $this->db->distinct();
          $this->db->from($this->table); 
          $cek_tanggal = ($awal <> '') && ($akhir <> '' );

          // Jika Yang diinput Data bukan tanggal
          if(($q <> '') && ($cek_tanggal <> 1) ) {
          // Query And didouble -> pada where
          $this->db->like('jenis_kelamin', 'P')->like('no_ktp', $q);
          // Jika yang diinput tanggal
          } else if(($q == '') && ($cek_tanggal == 1)) {
              $this->db->where('jenis_kelamin', 'P')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
          // Jika tidak ada yang diinput
          } else {
              $this->db->where('jenis_kelamin', 'P');
          }
          return $this->db->count_all_results();
    }

    function getBalingbing($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
            $this->db->like('alamat', 'BALINGBING')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'BALINGBING')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'BALINGBING');
        }
        return $this->db->count_all_results();
    }

    function getCidahu($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
            $this->db->like('alamat', 'CIDAHU')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'CIDAHU')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'CIDAHU');
        }
        return $this->db->count_all_results();
    }

    function getMunjul($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
        $this->db->like('alamat', 'MUNJUL')->like('no_ktp', $q);        
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'MUNJUL')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'MUNJUL');
        }
        return $this->db->count_all_results();
    }

    function getMargahayu($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
        $this->db->like('alamat', 'MARGAHAYU')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'MARGAHAYU')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'MARGAHAYU');
        }
        return $this->db->count_all_results();
    }

    function getBendungan($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
        $this->db->like('alamat', 'BENDUNGAN')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'BENDUNGAN')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'BENDUNGAN');
        }
        return $this->db->count_all_results();
    }

    function getCidadap($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
            $this->db->like('alamat', 'CIDADAP')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'CIDADAP')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'CIDADAP');
        }
        return $this->db->count_all_results();
    }

    function getMekarwangi($q = NULL, $awal = NULL, $akhir = NULL) {
       // Ambil Tabel
       $this->db->distinct();
       $this->db->from($this->table); 
       $cek_tanggal = ($awal <> '') && ($akhir <> '' );

       // Jika Yang diinput Data bukan tanggal
       if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
        $this->db->like('alamat', 'MEKARWANGI')->like('no_ktp', $q);
       // Jika yang diinput tanggal
       } else if(($q == '') && ($cek_tanggal == 1)) {
           $this->db->where('alamat', 'MEKARWANGI')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
       // Jika tidak ada yang diinput
       } else {
           $this->db->where('alamat', 'MEKARWANGI');
       }
       return $this->db->count_all_results();
    }

    function getPangsor($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
        $this->db->like('alamat', 'PANGSOR')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'PANGSOR')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'PANGSOR');
        }
        return $this->db->count_all_results();
    }

    function getSumurgintung($q = NULL, $awal = NULL, $akhir = NULL) {
       // Ambil Tabel
       $this->db->distinct();
       $this->db->from($this->table); 
       $cek_tanggal = ($awal <> '') && ($akhir <> '' );

       // Jika Yang diinput Data bukan tanggal
       if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
        $this->db->like('alamat', 'SUMURGINTUNG')->like('no_ktp', $q);
       // Jika yang diinput tanggal
       } else if(($q == '') && ($cek_tanggal == 1)) {
           $this->db->where('alamat', 'SUMURGINTUNG')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
       // Jika tidak ada yang diinput
       } else {
           $this->db->where('alamat', 'SUMURGINTUNG');
       }
       return $this->db->count_all_results();
    }

    function getLuar($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
        $this->db->like('alamat', 'LUAR')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('alamat', 'LUAR')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('alamat', 'LUAR');
        }
        return $this->db->count_all_results();
    }

    function getPoligigi($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
        $this->db->like('id_poli', 'POLI GIGI')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('id_poli', 'POLI GIGI')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('id_poli', 'POLI GIGI');
        }
        return $this->db->count_all_results();
    }

    function getPoliumum($q = NULL, $awal = NULL, $akhir = NULL) {
        // Ambil Tabel
        $this->db->distinct();
        $this->db->from($this->table); 
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika Yang diinput Data bukan tanggal
        if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
        $this->db->like('id_poli', 'POLI UMUM')->like('no_ktp', $q);
        // Jika yang diinput tanggal
        } else if(($q == '') && ($cek_tanggal == 1)) {
            $this->db->where('id_poli', 'POLI UMUM')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
        // Jika tidak ada yang diinput
        } else {
            $this->db->where('id_poli', 'POLI UMUM');
        }
        return $this->db->count_all_results();
    }

    function getPolimtbs($q = NULL, $awal = NULL, $akhir = NULL) {
         // Ambil Tabel
         $this->db->distinct();
         $this->db->from($this->table); 
         $cek_tanggal = ($awal <> '') && ($akhir <> '' );
 
         // Jika Yang diinput Data bukan tanggal
         if(($q <> '') && ($cek_tanggal <> 1) ) {
            // Query And didouble -> pada where
            $this->db->like('id_poli', 'POLI MTBS')->like('no_ktp', $q);
            // Jika yang diinput tanggal
         } else if(($q == '') && ($cek_tanggal == 1)) {
             $this->db->where('id_poli', 'POLI MTBS')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
         // Jika tidak ada yang diinput
         } else {
             $this->db->where('id_poli', 'POLI MTBS');
         }
         return $this->db->count_all_results();
    }

    function getPolikia($q = NULL, $awal = NULL, $akhir = NULL) {
         // Ambil Tabel
         $this->db->distinct();
         $this->db->from($this->table); 
         $cek_tanggal = ($awal <> '') && ($akhir <> '' );
 
         // Jika Yang diinput Data bukan tanggal
         if(($q <> '') && ($cek_tanggal <> 1) ) {
        // Query And didouble -> pada where
        $this->db->like('id_poli', 'POLI KIA/KB')->like('no_ktp', $q);   
         // Jika yang diinput tanggal
         } else if(($q == '') && ($cek_tanggal == 1)) {
             $this->db->where('id_poli', 'POLI KIA/KB')->where('tanggal_pendaftaran >=', $awal)->where('tanggal_pendaftaran <=', $akhir);
         // Jika tidak ada yang diinput
         } else {
             $this->db->where('id_poli', 'POLI KIA/KB');
         }
         return $this->db->count_all_results();
    }


    



    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('no_rekamedis', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('nama_pasien', $q);
    $this->db->or_like('ketpasien', $q);
    $this->db->or_like('bin_binti', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('tanggal_pendaftaran', $q);
    $this->db->or_like('alamat', $q);
    $this->db->or_like('rt_rw_lengkap', $q);
	$this->db->or_like('status_pasien', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Filter data yang akan ditampilkan berdasarkan no ktp
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->distinct();
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_ktp', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}


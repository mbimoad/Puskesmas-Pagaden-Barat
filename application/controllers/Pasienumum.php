<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasienumum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_pasienumum_model');
        $this->load->library('form_validation');
    }
    
    public function hapudata() {
        $this->load->model('Tbl_pasienumum_model');
        $this->Tbl_pasienumum_model->deletealldata();
        redirect(site_url('pasienumum'));
    }

    public function index()
    {
        $q     = urldecode($this->input->get('q', TRUE));
        $awal  = urldecode($this->input->get('awal', TRUE));
        $akhir = urldecode($this->input->get('akhir', TRUE));
        $start = intval($this->uri->segment(3)); // NILAI PAGINATION

        // Jika User Mengisikan tanggal awal dan akhir. Nilainya 1 (true)
        $cek_tanggal = ($awal <> '') && ($akhir <> '' );

        // Jika User Mengisikan Input data
        if (($q <> '') && ($cek_tanggal <> 1)) {
            $config['base_url'] = base_url() . 'index.php/pasienumum/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pasienumum/index?q=' . urlencode($q);
            $config['per_page'] = 1000;
            $config['page_query_string'] = FALSE;
            $config['total_rows'] = $this->Tbl_pasienumum_model->total_rows($q);
            $config['pasienLama'] = $this->Tbl_pasienumum_model->getPasienLama($q);
            $pasien = $this->Tbl_pasienumum_model->get_limit_data($config['per_page'], $start, $q);
            $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
            $config['full_tag_close'] = '</ul>';

            // Get Total 
            
            $config['total_dataumum']   = $this->Tbl_pasienumum_model->getTotalUMUM($q, $awal, $akhir);
            $config['total_pasienlama'] = $this->Tbl_pasienumum_model->getPasienLama($q, $awal, $akhir);
            $config['total_pasienbaru'] = $this->Tbl_pasienumum_model->getPasienBaru($q, $awal, $akhir);;
            $config['total_pasienlaki'] = $this->Tbl_pasienumum_model->getPasienLaki($q, $awal, $akhir);
            $config['total_pasienperempuan'] = $this->Tbl_pasienumum_model->getPasienPerempuan($q, $awal, $akhir);;
            $config['total_balingbing'] = $this->Tbl_pasienumum_model->getBalingbing($q, $awal, $akhir);
            $config['total_bendungan'] = $this->Tbl_pasienumum_model->getBendungan($q, $awal, $akhir);
            $config['total_cidahu'] = $this->Tbl_pasienumum_model->getCidahu($q, $awal, $akhir);
            $config['total_cidadap'] = $this->Tbl_pasienumum_model->getCidadap($q, $awal, $akhir);
            $config['total_margahayu'] = $this->Tbl_pasienumum_model->getMargahayu($q, $awal, $akhir);
            $config['total_mekarwangi'] = $this->Tbl_pasienumum_model->getMekarwangi($q, $awal, $akhir);
            $config['total_munjul'] = $this->Tbl_pasienumum_model->getMunjul($q, $awal, $akhir);
            $config['total_pangsor'] = $this->Tbl_pasienumum_model->getPangsor($q, $awal, $akhir);
            $config['total_sumurgintung'] = $this->Tbl_pasienumum_model->getSumurgintung($q, $awal, $akhir);
            $config['total_luar'] = $this->Tbl_pasienumum_model->getLuar($q, $awal, $akhir);
            $config['total_umum'] = $this->Tbl_pasienumum_model->getPoliumum($q, $awal, $akhir);
            $config['total_gigi'] = $this->Tbl_pasienumum_model->getPoligigi($q, $awal, $akhir);
            $config['total_mtbs'] = $this->Tbl_pasienumum_model->getPolimtbs($q, $awal, $akhir);
            $config['total_kia'] = $this->Tbl_pasienumum_model->getPolikia($q, $awal, $akhir);


            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array (
                'pasien_data' => $pasien,
                'q' => $q,
                'awal' => $awal,
                'akhir' => $akhir,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],  
                'pasienLama' => $config['pasienLama'],
                'start' => $start,  

                 // Total
                 'total_dataumum' => $config['total_dataumum'],
                 'total_pasienlama' => $config['total_pasienlama'],
                 'total_pasienbaru' => $config['total_pasienbaru'],
                 'total_pasienlaki' => $config['total_pasienlaki'],
                 'total_pasienperempuan' => $config['total_pasienperempuan'],
                 'total_balingbing' => $config['total_balingbing'],
                 'total_bendungan' => $config['total_bendungan'],
                 'total_cidahu' => $config['total_cidahu'],
                 'total_cidadap' => $config['total_cidadap'],
                 'total_margahayu' => $config['total_margahayu'],
                 'total_mekarwangi' => $config['total_mekarwangi'],
                 'total_munjul' => $config['total_munjul'],
                 'total_pangsor' => $config['total_pangsor'],
                 'total_sumurgintung' => $config['total_sumurgintung'],
                 'total_luar' => $config['total_luar'],
                 'total_umum' => $config['total_umum'],
                 'total_gigi' => $config['total_gigi'],
                 'total_mtbs' => $config['total_mtbs'],
                 'total_kia' => $config['total_kia'],



            );

            
        // Jika User Menginput tanggal between (TRUE)
        } if (($q == '') && ($cek_tanggal == 1)) {
            $config['base_url'] = base_url() . 'index.php/pasienumum/awal?awal=' . urlencode($awal) . "&akhir=" . urlencode($akhir);
            $config['first_url'] = base_url() . 'index.php/pasienumum/awal?awal=' . urlencode($awal) . "&akhir=" . urlencode($akhir);
            $config['per_page'] = 1000;
            $config['page_query_string'] = FALSE;
            $config['total_rows'] = $this->Tbl_pasienumum_model->total_rows($awal);
            $config['total_rows'] = $this->Tbl_pasienumum_model->total_rows($akhir);
            $config['pasienLama'] = $this->Tbl_pasienumum_model->getPasienLama($awal);
            $start = intval($this->uri->segment(3)); // NILAI PAGINATION
            $pasien = $this->Tbl_pasienumum_model->get_between_data($config['per_page'], $start, $awal, $akhir);
            $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
            $config['full_tag_close'] = '</ul>';

             // Get Total 
             $config['total_dataumum']   = $this->Tbl_pasienumum_model->getTotalUMUM($q, $awal, $akhir);
             $config['total_pasienlama'] = $this->Tbl_pasienumum_model->getPasienLama($q, $awal, $akhir);;
             $config['total_pasienbaru'] = $this->Tbl_pasienumum_model->getPasienBaru($q, $awal, $akhir);;
             $config['total_pasienlaki'] = $this->Tbl_pasienumum_model->getPasienLaki($q, $awal, $akhir);
             $config['total_pasienperempuan'] = $this->Tbl_pasienumum_model->getPasienPerempuan($q, $awal, $akhir);;
             $config['total_balingbing'] = $this->Tbl_pasienumum_model->getBalingbing($q, $awal, $akhir);
             $config['total_bendungan'] = $this->Tbl_pasienumum_model->getBendungan($q, $awal, $akhir);
             $config['total_cidahu'] = $this->Tbl_pasienumum_model->getCidahu($q, $awal, $akhir);
             $config['total_cidadap'] = $this->Tbl_pasienumum_model->getCidadap($q, $awal, $akhir);
             $config['total_margahayu'] = $this->Tbl_pasienumum_model->getMargahayu($q, $awal, $akhir);
             $config['total_mekarwangi'] = $this->Tbl_pasienumum_model->getMekarwangi($q, $awal, $akhir);
             $config['total_munjul'] = $this->Tbl_pasienumum_model->getMunjul($q, $awal, $akhir);
             $config['total_pangsor'] = $this->Tbl_pasienumum_model->getPangsor($q, $awal, $akhir);
             $config['total_sumurgintung'] = $this->Tbl_pasienumum_model->getSumurgintung($q, $awal, $akhir);
             $config['total_luar'] = $this->Tbl_pasienumum_model->getLuar($q, $awal, $akhir);
             $config['total_umum'] = $this->Tbl_pasienumum_model->getPoliumum($q, $awal, $akhir);
             $config['total_gigi'] = $this->Tbl_pasienumum_model->getPoligigi($q, $awal, $akhir);
             $config['total_mtbs'] = $this->Tbl_pasienumum_model->getPolimtbs($q, $awal, $akhir);
             $config['total_kia'] = $this->Tbl_pasienumum_model->getPolikia($q, $awal, $akhir);

            $this->load->library('pagination');
            $this->pagination->initialize($config);
    
            $data = array(
                'pasien_data' => $pasien,
                'q' => $q,
                'awal' => $awal,
                'akhir' => $akhir,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],  
                'pasienLama' => $config['pasienLama'],
                'start' => $start,  

                // Total
                'total_dataumum' => $config['total_dataumum'],
                'total_pasienlama' => $config['total_pasienlama'],
                'total_pasienbaru' => $config['total_pasienbaru'],
                'total_pasienlaki' => $config['total_pasienlaki'],
                'total_pasienperempuan' => $config['total_pasienperempuan'],
                'total_balingbing' => $config['total_balingbing'],
                'total_bendungan' => $config['total_bendungan'],
                'total_cidahu' => $config['total_cidahu'],
                'total_cidadap' => $config['total_cidadap'],
                'total_margahayu' => $config['total_margahayu'],
                'total_mekarwangi' => $config['total_mekarwangi'],
                'total_munjul' => $config['total_munjul'],
                'total_pangsor' => $config['total_pangsor'],
                'total_sumurgintung' => $config['total_sumurgintung'],
                'total_luar' => $config['total_luar'],
                'total_umum' => $config['total_umum'],
                'total_gigi' => $config['total_gigi'],
                'total_mtbs' => $config['total_mtbs'],
                'total_kia' => $config['total_kia'],


            );
            
        }
        // Jika User tidak menginputkan apapun
        else {
            $config['base_url'] = base_url() . 'index.php/pasienumum/index/';
            $config['first_url'] = base_url() . 'index.php/pasienumum/index/';
            $config['per_page'] = 10;
            $config['page_query_string'] = FALSE;
            $pasien = $this->Tbl_pasienumum_model->get_limit_data($config['per_page'], $start, $q);
            $config['total_rows'] = $this->Tbl_pasienumum_model->total_rows($q);
            
            $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
            $config['full_tag_close'] = '</ul>';

            // Get Total 
            $config['total_dataumum']   = $this->Tbl_pasienumum_model->getTotalUMUM($q, $awal, $akhir);
            $config['total_pasienlama'] = $this->Tbl_pasienumum_model->getPasienLama($q, $awal, $akhir);;
            $config['total_pasienbaru'] = $this->Tbl_pasienumum_model->getPasienBaru($q, $awal, $akhir);;
            $config['total_pasienlaki'] = $this->Tbl_pasienumum_model->getPasienLaki($q, $awal, $akhir);
            $config['total_pasienperempuan'] = $this->Tbl_pasienumum_model->getPasienPerempuan($q, $awal, $akhir);;
            $config['total_balingbing'] = $this->Tbl_pasienumum_model->getBalingbing($q, $awal, $akhir);
            $config['total_bendungan'] = $this->Tbl_pasienumum_model->getBendungan($q, $awal, $akhir);
            $config['total_cidahu'] = $this->Tbl_pasienumum_model->getCidahu($q, $awal, $akhir);
            $config['total_cidadap'] = $this->Tbl_pasienumum_model->getCidadap($q, $awal, $akhir);
            $config['total_margahayu'] = $this->Tbl_pasienumum_model->getMargahayu($q, $awal, $akhir);
            $config['total_mekarwangi'] = $this->Tbl_pasienumum_model->getMekarwangi($q, $awal, $akhir);
            $config['total_munjul'] = $this->Tbl_pasienumum_model->getMunjul($q, $awal, $akhir);
            $config['total_pangsor'] = $this->Tbl_pasienumum_model->getPangsor($q, $awal, $akhir);
            $config['total_sumurgintung'] = $this->Tbl_pasienumum_model->getSumurgintung($q, $awal, $akhir);
            $config['total_luar'] = $this->Tbl_pasienumum_model->getLuar($q, $awal, $akhir);
            $config['total_umum'] = $this->Tbl_pasienumum_model->getPoliumum($q, $awal, $akhir);
            $config['total_gigi'] = $this->Tbl_pasienumum_model->getPoligigi($q, $awal, $akhir);
            $config['total_mtbs'] = $this->Tbl_pasienumum_model->getPolimtbs($q, $awal, $akhir);
            $config['total_kia'] = $this->Tbl_pasienumum_model->getPolikia($q, $awal, $akhir);


            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'pasien_data' => $pasien,
                'q' => $q,
                'awal' => $awal,
                'akhir' => $akhir,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],  

                'start' => $start,  

                // Total
                'total_dataumum' => $config['total_dataumum'],
                'total_pasienlama' => $config['total_pasienlama'],
                'total_pasienbaru' => $config['total_pasienbaru'],
                'total_pasienlaki' => $config['total_pasienlaki'],
                'total_pasienperempuan' => $config['total_pasienperempuan'],
                'total_balingbing' => $config['total_balingbing'],
                'total_bendungan' => $config['total_bendungan'],
                'total_cidahu' => $config['total_cidahu'],
                'total_cidadap' => $config['total_cidadap'],
                'total_margahayu' => $config['total_margahayu'],
                'total_mekarwangi' => $config['total_mekarwangi'],
                'total_munjul' => $config['total_munjul'],
                'total_pangsor' => $config['total_pangsor'],
                'total_sumurgintung' => $config['total_sumurgintung'],
                'total_luar' => $config['total_luar'],
                'total_umum' => $config['total_umum'],
                'total_gigi' => $config['total_gigi'],
                'total_mtbs' => $config['total_mtbs'],
                'total_kia' => $config['total_kia'],
            );       
        }

        $this->template->load('template','pasienumum/tbl_pasien_list', $data);
    }

    


    public function excel() {
		$this->load->model('Tbl_pasienumum_model');
		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet()->setPrintGridlines(true);
        // Set Title For Excel Files
        $sheet->mergeCells('B1:L1'); 
        $sheet->setCellValue('B1', 'Data Pasien Umum');
        $sheet->mergeCells('B2:L2'); 
        $sheet->setCellValue('B2', 'Puskesmas Pagaden barat ' . date("d-m-Y"));
		$sheet->setCellValue('A3', 'No');
		$sheet->setCellValue('B3', 'Tgl Daftar');
		$sheet->setCellValue('C3', 'Jam');
		$sheet->setCellValue('D3', 'NoRekmed');
		$sheet->setCellValue('E3', 'KetPasien');
		$sheet->setCellValue('F3', 'NoKTP');
		$sheet->setCellValue('G3', 'Nama Pasien');
		$sheet->setCellValue('H3', 'Bin/Binti');
		$sheet->setCellValue('I3', 'JK');
		$sheet->setCellValue('J3', 'Tgl Lahir');
		$sheet->setCellValue('K3', 'DESA');
		$sheet->setCellValue('L3', 'RT/RW');
		$sheet->setCellValue('M3', 'ID Poli');

        $start = intval($this->uri->segment(3)); // NILAI PAGINATION
        $uri3     = $this->uri->segment(3);
        $uri4     = $this->uri->segment(4);
        
        // Jika user tidak memfilter data
        if(($uri3 == NULL) && ($uri4 == NULL)) {
            $pasien_Umum = $this->Tbl_pasienumum_model->getAll();

            // Total
            $total_dataumum = $this->Tbl_pasienumum_model->getTotalUMUM(NULL, NULL, NULL);
            $total_pasienlama = $this->Tbl_pasienumum_model->getPasienLama(NULL, NULL, NULL);;
            $total_pasienbaru = $this->Tbl_pasienumum_model->getPasienBaru(NULL, NULL, NULL);;
            $total_pasienlaki = $this->Tbl_pasienumum_model->getPasienLaki(NULL, NULL, NULL);
            $total_pasienperempuan = $this->Tbl_pasienumum_model->getPasienPerempuan(NULL, NULL, NULL);;
            $total_balingbing = $this->Tbl_pasienumum_model->getBalingbing(NULL, NULL, NULL);
            $total_bendungan = $this->Tbl_pasienumum_model->getBendungan(NULL, NULL, NULL);
            $total_cidahu = $this->Tbl_pasienumum_model->getCidahu(NULL, NULL, NULL);
            $total_cidadap = $this->Tbl_pasienumum_model->getCidadap(NULL, NULL, NULL);
            $total_margahayu = $this->Tbl_pasienumum_model->getMargahayu(NULL, NULL, NULL);
            $total_mekarwangi = $this->Tbl_pasienumum_model->getMekarwangi(NULL, NULL, NULL);
            $total_munjul = $this->Tbl_pasienumum_model->getMunjul(NULL, NULL, NULL);
            $total_pangsor = $this->Tbl_pasienumum_model->getPangsor(NULL, NULL, NULL);
            $total_sumurgintung= $this->Tbl_pasienumum_model->getSumurgintung(NULL, NULL, NULL);
            $total_luar = $this->Tbl_pasienumum_model->getLuar(NULL, NULL, NULL);
            $total_umum = $this->Tbl_pasienumum_model->getPoliumum(NULL, NULL, NULL);
            $total_gigi = $this->Tbl_pasienumum_model->getPoligigi(NULL, NULL, NULL);
            $total_mtbs = $this->Tbl_pasienumum_model->getPolimtbs(NULL, NULL, NULL);
            $total_kia = $this->Tbl_pasienumum_model->getPolikia(NULL, NULL, NULL);
            
        }
        // Jika hanya mencari data
        else if($uri4 == NULL) { 
            $pasien_Umum = $this->Tbl_pasienumum_model->getDataByFilter($uri3); 
            // Ambil Total
            $total_dataumum = $this->Tbl_pasienumum_model->getTotalUMUM($uri3, NULL, NULL);
            $total_pasienlama = $this->Tbl_pasienumum_model->getPasienLama($uri3, NULL, NULL);;
            $total_pasienbaru = $this->Tbl_pasienumum_model->getPasienBaru($uri3, NULL, NULL);;
            $total_pasienlaki = $this->Tbl_pasienumum_model->getPasienLaki($uri3, NULL, NULL);
            $total_pasienperempuan = $this->Tbl_pasienumum_model->getPasienPerempuan($uri3, NULL, NULL);;
            $total_balingbing = $this->Tbl_pasienumum_model->getBalingbing($uri3, NULL, NULL);
            $total_bendungan = $this->Tbl_pasienumum_model->getBendungan($uri3, NULL, NULL);
            $total_cidahu = $this->Tbl_pasienumum_model->getCidahu($uri3, NULL, NULL);
            $total_cidadap = $this->Tbl_pasienumum_model->getCidadap($uri3, NULL, NULL);
            $total_margahayu = $this->Tbl_pasienumum_model->getMargahayu($uri3, NULL, NULL);
            $total_mekarwangi = $this->Tbl_pasienumum_model->getMekarwangi($uri3, NULL, NULL);
            $total_munjul = $this->Tbl_pasienumum_model->getMunjul($uri3, NULL, NULL);
            $total_pangsor = $this->Tbl_pasienumum_model->getPangsor($uri3, NULL, NULL);
            $total_sumurgintung= $this->Tbl_pasienumum_model->getSumurgintung($uri3, NULL, NULL);
            $total_luar = $this->Tbl_pasienumum_model->getLuar($uri3, NULL, NULL);
            $total_umum = $this->Tbl_pasienumum_model->getPoliumum($uri3, NULL, NULL);
            $total_gigi = $this->Tbl_pasienumum_model->getPoligigi($uri3, NULL, NULL);
            $total_mtbs = $this->Tbl_pasienumum_model->getPolimtbs($uri3, NULL, NULL);
            $total_kia = $this->Tbl_pasienumum_model->getPolikia($uri3, NULL, NULL);


            
        } 

        // Jika Filter data dengan tanggal
        else {                   
            $pasien_Umum = $this->Tbl_pasienumum_model->getDateByFilter($uri3, $uri4);
            // Total
            $total_dataumum = $this->Tbl_pasienumum_model->getTotalUMUM(NULL, $uri3, $uri4);
            $total_pasienlama = $this->Tbl_pasienumum_model->getPasienLama(NULL, $uri3, $uri4);;
            $total_pasienbaru = $this->Tbl_pasienumum_model->getPasienBaru(NULL, $uri3, $uri4);;
            $total_pasienlaki = $this->Tbl_pasienumum_model->getPasienLaki(NULL, $uri3, $uri4);
            $total_pasienperempuan = $this->Tbl_pasienumum_model->getPasienPerempuan(NULL, $uri3, $uri4);;
            $total_balingbing = $this->Tbl_pasienumum_model->getBalingbing(NULL, $uri3, $uri4);
            $total_bendungan = $this->Tbl_pasienumum_model->getBendungan(NULL, $uri3, $uri4);
            $total_cidahu = $this->Tbl_pasienumum_model->getCidahu(NULL, $uri3, $uri4);
            $total_cidadap = $this->Tbl_pasienumum_model->getCidadap(NULL, $uri3, $uri4);
            $total_margahayu = $this->Tbl_pasienumum_model->getMargahayu(NULL, $uri3, $uri4);
            $total_mekarwangi = $this->Tbl_pasienumum_model->getMekarwangi(NULL, $uri3, $uri4);
            $total_munjul = $this->Tbl_pasienumum_model->getMunjul(NULL, $uri3, $uri4);
            $total_pangsor = $this->Tbl_pasienumum_model->getPangsor(NULL, $uri3, $uri4);
            $total_sumurgintung= $this->Tbl_pasienumum_model->getSumurgintung(NULL, $uri3, $uri4);
            $total_luar = $this->Tbl_pasienumum_model->getLuar(NULL, $uri3, $uri4);
            $total_umum = $this->Tbl_pasienumum_model->getPoliumum(NULL, $uri3, $uri4);
            $total_gigi = $this->Tbl_pasienumum_model->getPoligigi(NULL, $uri3, $uri4);
            $total_mtbs = $this->Tbl_pasienumum_model->getPolimtbs(NULL, $uri3, $uri4);
            $total_kia = $this->Tbl_pasienumum_model->getPolikia(NULL, $uri3, $uri4);   
        }
	
		$no    = 1;
        $kolom = 4;
		foreach($pasien_Umum as $row) {
			$sheet->setCellValue('A'.$kolom, $no++);
			$sheet->setCellValue('B'.$kolom, $row->tanggal_pendaftaran);
			$sheet->setCellValue('C'.$kolom, $row->jam_pendaftaran);
			$sheet->setCellValue('D'.$kolom, $row->no_rekamedis);
			$sheet->setCellValue('E'.$kolom, $row->ketpasien);
            // Convert Nilai Exponential
			$sheet->setCellValue('F'.$kolom, $row->no_ktp)
                                                ->getStyle('F' . $kolom)
                                                ->getNumberFormat()
                                                ->setFormatCode('0');                          
			$sheet->setCellValue('G'.$kolom, $row->nama_pasien);
			$sheet->setCellValue('H'.$kolom, $row->bin_binti);
			$sheet->setCellValue('I'.$kolom, $row->jenis_kelamin);
			$sheet->setCellValue('J'.$kolom, $row->tanggal_lahir);
			$sheet->setCellValue('K'.$kolom, $row->alamat);
			$sheet->setCellValue('L'.$kolom, $row->rt_rw_lengkap);
			$sheet->setCellValue('M'.$kolom, $row->id_poli);
			$kolom++;            
        }


        // Pasang Total 
        $tmp = $kolom + 2; 
        $header = $kolom + 1; 
        $sheet->mergeCells('A' . $header . ':I' . $header); 
        $sheet->setCellValue('A' . $header, 'Total Data Statistik');
        $sheet->setCellValue('A' . $tmp, 'Umum');         
        $sheet->setCellValue('B' . $tmp, $total_dataumum );  
        
        $sheet->setCellValue('E' . $tmp, 'Balingbing');  
        $sheet->setCellValue('F' . $tmp, $total_balingbing ); 
        
        $sheet->setCellValue('H' . $tmp, 'Poli Umum');  
        $sheet->setCellValue('I' . $tmp, $total_umum );  

        $tmp++;


        $sheet->setCellValue('A' . $tmp, 'Lama');  
        $sheet->setCellValue('B' . $tmp, $total_pasienlama );  

        $sheet->setCellValue('E' . $tmp, 'Bendungan');  
        $sheet->setCellValue('F' . $tmp, $total_bendungan );  

        $sheet->setCellValue('H' . $tmp, 'Poli Gigi');  
        $sheet->setCellValue('I' . $tmp, $total_gigi);  

        $tmp++;


        $sheet->setCellValue('A' . $tmp, 'Baru');  
        $sheet->setCellValue('B' . $tmp, $total_pasienbaru );
        
        $sheet->setCellValue('E' . $tmp, 'Cidadap'); 
        $sheet->setCellValue('F' . $tmp, $total_cidadap ); 
 
        $sheet->setCellValue('H' . $tmp, 'Poli MTBS');  
        $sheet->setCellValue('I' . $tmp, $total_mtbs ); 

        $tmp++;

        $sheet->setCellValue('A' . $tmp, 'L');  
        $sheet->setCellValue('B' . $tmp, $total_pasienlaki );  

        $sheet->setCellValue('E' . $tmp, 'Cidahu');  
        $sheet->setCellValue('F' . $tmp, $total_cidahu );  

        $sheet->setCellValue('H' . $tmp, 'Poli KB/KIA');  
        $sheet->setCellValue('I' . $tmp, $total_kia);  

        $tmp++;

        $sheet->setCellValue('A' . $tmp, 'P');  
        $sheet->setCellValue('B' . $tmp, $total_pasienperempuan );  

        $sheet->setCellValue('E' . $tmp, 'Margahayu');  
        $sheet->setCellValue('F' . $tmp, $total_margahayu ); 
        
        // Pisah
        $tmp = $tmp+2;

        $sheet->setCellValue('E' . $tmp, 'Mekarwangi');  
        $sheet->setCellValue('F' . $tmp, $total_mekarwangi );  
        $tmp++;

        $sheet->setCellValue('E' . $tmp, 'Munjul');  
        $sheet->setCellValue('F' . $tmp, $total_munjul );  
        $tmp++;

        $sheet->setCellValue('E' . $tmp, 'Pangsor');  
        $sheet->setCellValue('F' . $tmp, $total_pangsor );  
        $tmp++;

        $sheet->setCellValue('E' . $tmp, 'Sumurgintung');  
        $sheet->setCellValue('F' . $tmp, $total_sumurgintung);  
        $tmp++;

        $sheet->setCellValue('E' . $tmp, 'Luar');  
        $sheet->setCellValue('F' . $tmp, $total_luar );
    
        
        // Set Auto Column
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);

        // Set Text Centering On Column B 
        $sheet->getStyle('B')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A')->getAlignment()->setHorizontal('center');

        $sheet->setPrintGridlines(true);

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    // Atur Ukuran Ketebalan Border
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];

        

        // Set the document footer on the left by '&L', and on the right by '&R',
        $sheet->getHeaderFooter()->setOddFooter('&LFooter of the Document&RPage &P of &N');
        
        
        $sheet->getStyle('A3:M' . ($kolom - 1))->applyFromArray($styleArray);
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-pasien_Umum';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

     


   function cetak()
   {   
    $this->load->library('pdf');
    $pdf = new FPDF('l', 'mm', array(410,380));    
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Image(base_url() . '/assets/foto_profil/logo-rs.png', 75, 5, 30);
    $pdf->Cell(45, 7, '', 0, 0, 'C');
    $pdf->Cell(260, 7, 'PUSKESMAS PAGADEN BARAT', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(30, 7, '', 0, 0, 'C');
    $pdf->Cell(300, 7, 'Bendungan, Pagaden Barat, West Java 41252', 0, 1, 'C');
    $pdf->Cell(70, 7, '', 0, 0, 'C');
    $pdf->Cell(220, 7, 'Telepon : 0853-2185-0665. E-mail: puskesmaspagadenbarat@gmail.com', 0, 1, 'C');
    $pdf->Line(10,35, 410-20, 35);
    $pdf->Line(10,35.5, 410-20, 35.5);
    
    $pdf->Cell(30, 7, '', 0, 1);

    $pdf->Cell(70, 7, '', 0, 0, 'C');
    $pdf->Cell(220, 7, 'Laporan Data Pasien UMUM', 0, 1, 'C');


    //tabel hasil rekam medik
    $pdf->Cell(1,7, '',0,0,'C');
    $pdf->Cell(25, 7, 'NoRekmed ', 1, 0, 'C');
    $pdf->Cell(25, 7, 'Tgl Daftar  ', 1, 0, 'C');
    $pdf->Cell(20, 7, 'Jam  ', 1, 0, 'C');
    $pdf->Cell(20, 7, 'Pasien  ', 1, 0, 'C');
    $pdf->Cell(45, 7, 'No. KTP  ', 1, 0, 'C');
    $pdf->Cell(57, 7, 'Nama Pasien  ', 1, 0, 'C');
    $pdf->Cell(50, 7, 'Bin_Binti  ', 1, 0, 'C');
    $pdf->Cell(20, 7, 'Gender  ', 1, 0, 'C');
    $pdf->Cell(30, 7, 'TTL  ', 1, 0, 'C');
    $pdf->Cell(40, 7, 'Desa  ', 1, 0, 'C');
    $pdf->Cell(20, 7, 'RT/RW  ', 1, 0, 'C');
    $pdf->Cell(30, 7, 'Poli  ', 1, 1, 'C');

    $start    = intval($this->uri->segment(3)); // NILAI PAGINATION
    $uri3     = $this->uri->segment(3);
    $uri4     = $this->uri->segment(4);
    
    
    
    // Jika user tidak memfilter data
    if(($uri3 == NULL) && ($uri4 == NULL)) {    
        $pasien_umum = $this->Tbl_pasienumum_model->getAll();

        // Total
        $total_dataumum = $this->Tbl_pasienumum_model->getTotalUMUM(NULL, NULL, NULL);
        $total_pasienlama = $this->Tbl_pasienumum_model->getPasienLama(NULL, NULL, NULL);;
        $total_pasienbaru = $this->Tbl_pasienumum_model->getPasienBaru(NULL, NULL, NULL);;
        $total_pasienlaki = $this->Tbl_pasienumum_model->getPasienLaki(NULL, NULL, NULL);
        $total_pasienperempuan = $this->Tbl_pasienumum_model->getPasienPerempuan(NULL, NULL, NULL);;
        $total_balingbing = $this->Tbl_pasienumum_model->getBalingbing(NULL, NULL, NULL);
        $total_bendungan = $this->Tbl_pasienumum_model->getBendungan(NULL, NULL, NULL);
        $total_cidahu = $this->Tbl_pasienumum_model->getCidahu(NULL, NULL, NULL);
        $total_cidadap = $this->Tbl_pasienumum_model->getCidadap(NULL, NULL, NULL);
        $total_margahayu = $this->Tbl_pasienumum_model->getMargahayu(NULL, NULL, NULL);
        $total_mekarwangi = $this->Tbl_pasienumum_model->getMekarwangi(NULL, NULL, NULL);
        $total_munjul = $this->Tbl_pasienumum_model->getMunjul(NULL, NULL, NULL);
        $total_pangsor = $this->Tbl_pasienumum_model->getPangsor(NULL, NULL, NULL);
        $total_sumurgintung= $this->Tbl_pasienumum_model->getSumurgintung(NULL, NULL, NULL);
        $total_luar = $this->Tbl_pasienumum_model->getLuar(NULL, NULL, NULL);
        $total_umum = $this->Tbl_pasienumum_model->getPoliumum(NULL, NULL, NULL);
        $total_gigi = $this->Tbl_pasienumum_model->getPoligigi(NULL, NULL, NULL);
        $total_mtbs = $this->Tbl_pasienumum_model->getPolimtbs(NULL, NULL, NULL);
        $total_kia = $this->Tbl_pasienumum_model->getPolikia(NULL, NULL, NULL);
    }
    // Jika hanya mencari data
    else if($uri4 == NULL) { 
        $pasien_umum = $this->Tbl_pasienumum_model->getDataByFilter($uri3); 
        // Ambil Total
        $total_dataumum = $this->Tbl_pasienumum_model->getTotalUMUM($uri3, NULL, NULL);
        $total_pasienlama = $this->Tbl_pasienumum_model->getPasienLama($uri3, NULL, NULL);;
        $total_pasienbaru = $this->Tbl_pasienumum_model->getPasienBaru($uri3, NULL, NULL);;
        $total_pasienlaki = $this->Tbl_pasienumum_model->getPasienLaki($uri3, NULL, NULL);
        $total_pasienperempuan = $this->Tbl_pasienumum_model->getPasienPerempuan($uri3, NULL, NULL);;
        $total_balingbing = $this->Tbl_pasienumum_model->getBalingbing($uri3, NULL, NULL);
        $total_bendungan = $this->Tbl_pasienumum_model->getBendungan($uri3, NULL, NULL);
        $total_cidahu = $this->Tbl_pasienumum_model->getCidahu($uri3, NULL, NULL);
        $total_cidadap = $this->Tbl_pasienumum_model->getCidadap($uri3, NULL, NULL);
        $total_margahayu = $this->Tbl_pasienumum_model->getMargahayu($uri3, NULL, NULL);
        $total_mekarwangi = $this->Tbl_pasienumum_model->getMekarwangi($uri3, NULL, NULL);
        $total_munjul = $this->Tbl_pasienumum_model->getMunjul($uri3, NULL, NULL);
        $total_pangsor = $this->Tbl_pasienumum_model->getPangsor($uri3, NULL, NULL);
        $total_sumurgintung= $this->Tbl_pasienumum_model->getSumurgintung($uri3, NULL, NULL);
        $total_luar = $this->Tbl_pasienumum_model->getLuar($uri3, NULL, NULL);
        $total_umum = $this->Tbl_pasienumum_model->getPoliumum($uri3, NULL, NULL);
        $total_gigi = $this->Tbl_pasienumum_model->getPoligigi($uri3, NULL, NULL);
        $total_mtbs = $this->Tbl_pasienumum_model->getPolimtbs($uri3, NULL, NULL);
        $total_kia = $this->Tbl_pasienumum_model->getPolikia($uri3, NULL, NULL);
    } 

    // Jika Filter data dengan tanggal
    else {                   
        $pasien_umum = $this->Tbl_pasienumum_model->getDateByFilter($uri3, $uri4);
         // Total
         $total_dataumum = $this->Tbl_pasienumum_model->getTotalUMUM(NULL, $uri3, $uri4);
         $total_pasienlama = $this->Tbl_pasienumum_model->getPasienLama(NULL, $uri3, $uri4);;
         $total_pasienbaru = $this->Tbl_pasienumum_model->getPasienBaru(NULL, $uri3, $uri4);;
         $total_pasienlaki = $this->Tbl_pasienumum_model->getPasienLaki(NULL, $uri3, $uri4);
         $total_pasienperempuan = $this->Tbl_pasienumum_model->getPasienPerempuan(NULL, $uri3, $uri4);;
         $total_balingbing = $this->Tbl_pasienumum_model->getBalingbing(NULL, $uri3, $uri4);
         $total_bendungan = $this->Tbl_pasienumum_model->getBendungan(NULL, $uri3, $uri4);
         $total_cidahu = $this->Tbl_pasienumum_model->getCidahu(NULL, $uri3, $uri4);
         $total_cidadap = $this->Tbl_pasienumum_model->getCidadap(NULL, $uri3, $uri4);
         $total_margahayu = $this->Tbl_pasienumum_model->getMargahayu(NULL, $uri3, $uri4);
         $total_mekarwangi = $this->Tbl_pasienumum_model->getMekarwangi(NULL, $uri3, $uri4);
         $total_munjul = $this->Tbl_pasienumum_model->getMunjul(NULL, $uri3, $uri4);
         $total_pangsor = $this->Tbl_pasienumum_model->getPangsor(NULL, $uri3, $uri4);
         $total_sumurgintung= $this->Tbl_pasienumum_model->getSumurgintung(NULL, $uri3, $uri4);
         $total_luar = $this->Tbl_pasienumum_model->getLuar(NULL, $uri3, $uri4);
         $total_umum = $this->Tbl_pasienumum_model->getPoliumum(NULL, $uri3, $uri4);
         $total_gigi = $this->Tbl_pasienumum_model->getPoligigi(NULL, $uri3, $uri4);
         $total_mtbs = $this->Tbl_pasienumum_model->getPolimtbs(NULL, $uri3, $uri4);
         $total_kia = $this->Tbl_pasienumum_model->getPolikia(NULL, $uri3, $uri4);   
    }

    
    foreach ($pasien_umum as $r) {
        $pdf->Cell(1,7, '',0,0,'C');
        $pdf->Cell(25, 7, $r->no_rekamedis, 1, 0, 'C');
        $pdf->Cell(25, 7, $r->tanggal_pendaftaran, 1, 0, 'C');
        $pdf->Cell(20, 7, $r->jam_pendaftaran, 1, 0, 'C');
        $pdf->Cell(20, 7, $r->ketpasien, 1, 0, 'C');
        $pdf->Cell(45, 7, $r->no_ktp, 1, 0, 'C');
        $pdf->Cell(57, 7, $r->nama_pasien, 1, 0, 'C');
        $pdf->Cell(50, 7, $r->bin_binti, 1, 0, 'C');
        $pdf->Cell(20, 7, $r->jenis_kelamin, 1, 0, 'C');
        $pdf->Cell(30, 7, $r->tanggal_lahir, 1, 0, 'C');
        $pdf->Cell(40, 7, $r->alamat, 1, 0, 'C');
        $pdf->Cell(20, 7, $r->rt_rw_lengkap, 1, 0, 'C');
        $pdf->Cell(30, 7, $r->id_poli, 1, 1, 'C');
    }

    // Baris 1
    $pdf->Cell(130, 10, '', 0, 1);
    $pdf->Cell(40, 7, 'Total UMUM', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_dataumum, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Pasien Lama', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_pasienlama, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Pasien Baru', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_pasienbaru, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Pasien Laki', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_pasienlaki, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Pasien Perempuan', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_pasienperempuan, 3, 0, 'C');

    // Baris 2
    $pdf->Cell(130, 10, '', 0, 1);
    $pdf->Cell(40, 7, 'Total Balingbing', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_balingbing, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Bendungan', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_bendungan, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Cidahu', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_cidahu, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Cidadap', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_cidadap, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Margahayu', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_margahayu, 3, 0, 'C');

    // Baris 3
    $pdf->Cell(130, 10, '', 0, 1);
    $pdf->Cell(40, 7, 'Total Mekarwangi', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_mekarwangi, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Munjul', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_munjul, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Pangsor', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_pangsor, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total SumurGintung', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_sumurgintung, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Total Luar', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_luar, 3, 0, 'C');

    // Baris 4
    $pdf->Cell(130, 10, '', 0, 1);
    $pdf->Cell(40, 7, 'Poli Umum', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_umum, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Poli Gigi', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_gigi, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Poli MTBS', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_mtbs, 3, 0, 'C');
    $pdf->Cell(40, 7, 'Poli KB/KIA', 2, 0, 'C');
    $pdf->Cell(40, 7, $total_kia, 3, 0, 'C');
    
    // Baris 5
    $pdf->Cell(130, 40, '', 0, 1);
    $pdf->Cell(30, 7, 'Tanggal Cetak', 0, 0, 'R');
    $pdf->Cell(30, 7, ': '.date('d-m-Y '), 0, 0, 'R');
    $pdf->Output();
   }

    // function getbetween() {
    //     $tgl_awal  = $this->input->post('tgl_awal',TRUE);
    //     $tgl_akhir = $this->input->post('tgl_akhir',TRUE);
    //     $pasien = $this->Tbl_pasienumum_model->getDatabetween($tgl_awal, $tgl_akhir);

    //     $data = array(
    //         'pasien_data' => $pasien,
    //     );
    //     $this->template->load('template','pasienumum/tbl_pasien_list', $data);
    // }



    function cetakkartu($id){
        
        
        $sql_pasien = $this->Tbl_pasienumum_model->get_by_id($id);
        $this->load->library('pdf');
        $pdf = new FPDF();
        $pdf->AddPage('P','A4');

        $tgl=date('Y/m/d');
        $pdf->Image(base_url() . '/assets/foto_profil/latar-kartu.jpg',5,5,100,56);
        $pdf->Image(base_url() . '/assets/foto_profil/latar-kartu.jpg',106,5,100,56);
        $pdf->Image(base_url() . '/assets/foto_profil/logo-rs.png',10,9,10,10);
        $pdf->setFont('Arial','B',12);
        $pdf->Cell(90,5,'PUSKESMAS PAGADEN BARAT',0,0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->setFont('Arial','B',10);
        $pdf->Cell(90,5,'KETENTUAN',0,1,'C');
        $pdf->setFont('Arial','B',8);
        $pdf->Cell(90,5,'Bendungan, Pagaden Barat, West Java 41252',0,0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->setFont('Arial','',7);
        $pdf->Cell(90,5,'- Kartu ini hanya bisa digunakan untuk berobat di puskesmas Pagaden Barat.',0,1,'L');
        $pdf->SetLineWidth(0.2);
        $pdf->Line(10,20,100,20);
        $pdf->setFont('Arial','B',10);
        $pdf->Cell(90,5,'KARTU BEROBAT',0,0,'C');
        $pdf->Cell(10,5,'',0,0,'C');
        $pdf->setFont('Arial','',7);
        $pdf->Cell(90,5,'- Apabila kartu ini hilang / rusak, maka segera digantikan dengan kartu yang baru',0,1,'L');
        $pdf->SetLineWidth(0.2);
        $pdf->Line(10,25,100,25);
        $pdf->Ln(6);
        
        $pdf->setFont('Arial','',9);
        $pdf->Cell(60, 4, '', 0, 1);
        $pdf->Cell(22,4,'NO KTP',0,0,'L');
        $pdf->Cell(36,4,': '.$sql_pasien->no_ktp,0,0,'L');
        $pdf->Cell(10,4,'',0,1,'C');
        $pdf->setFont('Arial','',10);
        $pdf->Cell(22,4,'Nama Pasien',0,0,'L');
        $pdf->Cell(36,4,': '.$sql_pasien->nama_pasien,0,1,'L');
        $pdf->Cell(22,4,'Desa',0,0,'L');
        $pdf->Cell(36,4,': '.$sql_pasien->alamat,0,1,'L');
        $pdf->Ln(2);

        $pdf->Output('cetak-kartu-berobat.pdf','I');

            
        }

    public function read($id) 
    {
        $row = $this->Tbl_pasienumum_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_rekamedis' => $row->no_rekamedis,
		'no_ktp' => $row->no_ktp,
        'nama_pasien' => $row->nama_pasien,
        'ketpasien' => $row->ketpasien,
		'bin_binti' => $row->bin_binti,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tanggal_lahir' => $row->tanggal_lahir,
		'tanggal_pendaftaran' => $row->tanggal_pendaftaran,
        'alamat' => $row->alamat,
        'rt_rw_lengkap' => $row->rt_rw_lengkap,
		'id_poli' => $row->id_poli,
	    );
            $this->template->load('template','pasienumum/tbl_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasienumum'));
        }
    }


    function ktpauto() {
       autocomplate_json('tbl_pasienumum', 'no_ktp');
    }

    function autofill(){
        $no_ktp = $_GET['no_ktp'];
        $this->db->where('no_ktp',$no_ktp);

        $pasien = $this->db->get('tbl_pasienumum')->row_array();
        $data = array(
            'nama_pasien' => $pasien['nama_pasien'],
            'status_pasien' => $pasien['status_pasien'],
            'id_poli' => $pasien['id_poli'],
            'no_ktp' => $pasien['no_ktp'],
            'bin_binti' => $pasien['bin_binti'],
            'jenis_kelamin' => $pasien['jenis_kelamin'],
            'tanggal_lahir' => $pasien['tanggal_lahir'],
            'alamat' => $pasien['alamat'],
            'id_poli' => $pasien['id_poli'],
            'ketpasien' => $pasien['ketpasien'],
            'tanggal_pendaftaran' => $pasien['tanggal_pendaftaran'],
            'rt_rw_lengkap' => $pasien['rt_rw_lengkap'],
                
        );

        echo json_encode($data);
    }

    function noRekmedUMUMOtomatis(){
    $ci = get_instance();
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max(no_rekamedis) as maxKode FROM tbl_pasienumum";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode']; // Ambil Jumlah Terbaru Data 
    $noUrut = (int) substr($kode, 1, 5);
    $noUrut++;
    $kodeBaru = sprintf("U%05s", $noUrut);
    return $kodeBaru;
}

    public function create() 
    {
    $noRekammedisbaru = $this->noRekmedUMUMOtomatis();
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('pasienumum/create_action'),
	        'no_rekamedis' => set_value('no_rekamedis', $noRekammedisbaru),
    	    'no_ktp' => set_value('no_ktp'),
            'nama_pasien' => set_value('nama_pasien'),
            'rt_rw_lengkap' => set_value('rt_rw_lengkap'),
            'ketpasien' => set_value('ketpasien'),
    	    'bin_binti' => set_value('bin_binti'),
    	    'jenis_kelamin' => set_value('jenis_kelamin'),
    	    'tanggal_lahir' => set_value('tanggal_lahir'),
    	    'tanggal_pendaftaran' => set_value('tanggal_pendaftaran'),
    	    'jam_pendaftaran' => set_value('jam_pendaftaran'),
    	    'alamat' => set_value('alamat'),
            'status_pasien' => set_value('status_pasien'),
            'id_poli' => set_value('id_poli'),
	);
        $this->template->load('template','pasienumum/tbl_pasien_form', $data);
    }
    
    public function create_action() 
    {

        $ttl = $this->input->post('tanggal_pendaftaran',TRUE);
        $ttl2 = $this->input->post('tanggal_lahir',TRUE);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'no_ktp' => $this->input->post('no_ktp',TRUE),
        		
                'no_rekamedis' => $this->input->post('no_rekamedis', TRUE),
                'nama_pasien' => $this->input->post('nama_pasien',TRUE),
                'rt_rw_lengkap' => $this->input->post('rt_rw_lengkap',TRUE),
                'ketpasien' => $this->input->post('ketpasien',TRUE),
                'bin_binti' => $this->input->post('bin_binti',TRUE),
        		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
        		'tanggal_pendaftaran' => $this->input->post('tanggal_pendaftaran',TRUE),
        		'jam_pendaftaran' => $this->input->post('jam_pendaftaran',TRUE),
        		// 'tanggal_pendaftaran' => date('d-m-Y', strtotime($ttl))
        		'alamat' => $this->input->post('alamat',TRUE),
                'status_pasien' => $this->input->post('status_pasien',TRUE),
                'id_poli' => $this->input->post('id_poli',TRUE),

	    );

            $this->Tbl_pasienumum_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Masuk
            </div>');  
            redirect(site_url('pasienumum'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pasienumum_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasienumum/update_action'),
		'no_rekamedis' => set_value('no_rekamedis', $row->no_rekamedis),
		'no_ktp' => set_value('no_ktp', $row->no_ktp),
		
        'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
        'ketpasien' => set_value('ketpasien', $row->ketpasien),
        'rt_rw_lengkap' => set_value('rt_rw_lengkap', $row->rt_rw_lengkap),
		'bin_binti' => set_value('bin_binti', $row->bin_binti),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'tanggal_pendaftaran' => set_value('tanggal_pendaftaran', $row->tanggal_pendaftaran),
		'jam_pendaftaran' => set_value('jam_pendaftaran', $row->jam_pendaftaran),
		'alamat' => set_value('alamat', $row->alamat),
        'status_pasien' => set_value('status_pasien', $row->status_pasien),
        'id_poli' => set_value('id_poli', $row->id_poli),

	    );
            $this->template->load('template','pasienumum/tbl_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasienumum'));
        }
    }
    
    public function update_action() 
    {
                
        $ttl = $this->input->post('tanggal_pendaftaran',TRUE);
        $ttl2 = $this->input->post('tanggal_lahir',TRUE);

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_rekamedis', TRUE));
        } else {
            $data = array(
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		
        'nama_pasien' => $this->input->post('nama_pasien',TRUE),
        'ketpasien' => $this->input->post('ketpasien',TRUE),
		'bin_binti' => $this->input->post('bin_binti',TRUE),
        'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
        'rt_rw_lengkap' => $this->input->post('rt_rw_lengkap',TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tanggal_pendaftaran' => $this->input->post('tanggal_pendaftaran',TRUE),
		'jam_pendaftaran' => $this->input->post('jam_pendaftaran',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
        'status_pasien' => $this->input->post('status_pasien',TRUE),
        'id_poli' => $this->input->post('id_poli',TRUE),

	    );

            $this->Tbl_pasienumum_model->update($this->input->post('no_rekamedis', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Diupdate
            </div>');              redirect(site_url('pasienumum'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pasienumum_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pasienumum_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Dihapus
            </div>');              redirect(site_url('pasienumum'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasienumum'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required');
    $this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
    $this->form_validation->set_rules('ketpasien', 'Ket Pasien', 'trim|required');
	$this->form_validation->set_rules('bin_binti', 'Bin Binti', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_pendaftaran', 'tanggal pendaftaran', 'trim|required');
	$this->form_validation->set_rules('jam_pendaftaran', 'jam pendaftaran', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('rt_rw_lengkap', 'rt rw lengkap', 'trim|required');
	$this->form_validation->set_rules('id_poli', 'id_poli', 'trim|required');
    $this->form_validation->set_message('required', '{field} wajib diisi');


	$this->form_validation->set_rules('no_rekamedis', 'no_rekamedis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}


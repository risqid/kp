<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
    is_logged_in();
		$this->load->model('laporan_model');
	}

	public function index()
	{
	  $data['title'] = "Laporan";
		$data['subtitle'] = "Data Laporan";
    $data['url'] = "laporan";

    $data['last_year'] = date('Y') - 1;

		$this->db->select('tahun');
		$data['tahun'] = $this->db->get('neraca')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}

  public function pdf($tahun)
  {
    $data['titel'] = "Laporan PDF";
    $data['tahun'] = $tahun;
    $this->load->model('laporan_model');
    $data['laporan'] = $this->laporan_model->show($tahun);
    $this->load->helper('pdf_helper');

    $this->load->view('laporan/pdf', $data);
  }
	
    function get_laporan($tahun)
    {
        $this->load->model('laporan_model');
        $data['data'] = $this->laporan_model->show($tahun);
        $laporan = $data['data'];
        echo '<h5 class="card-title text-center">Laporan Keuangan Tahun '.$laporan['neraca']['tahun'].'</h5><br><h5 class="card-title">Pajak Badan</h5><br><table class="table table-striped"><thead><tr><th>Bulan</th><th>Penjualan</th><th>Pajak</th></tr></thead><tfoot><tr><th>Total</th><th>Rp'. number_format($laporan['total_penjualan']['penjualan'],0,',','.')  .'</th><th>Rp'. number_format($laporan['total_pajak']['pajak'],0,',','.')  .'</th></tr></tfoot><tbody>
        ';
        foreach ($laporan['pajak_badan'] as $pb) {
            echo '<tr><td>'. $pb['bulan'] .'</td><td>Rp'. number_format($pb['penjualan'], 0,',','.') .'</td><td>Rp'. number_format($pb['pajak'], 0,',','.') .'</td></tr>';
        }
        echo '
                              </tbody>
                            </table>
                            <h5 class="card-title">Biaya Lain</h5><br>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Kantor</th>
                                  <th>Gaji</th>
                                  <th>Bonus</th>
                                  <th>Transport</th>
                                  <th>Listrik</th>
                                  <th>Keamanan</th>
                                  <th>Kesehatan</th>
                                  <th>Konsumsi</th>
                                  <th>Air</th>
                                  <th>Lainlain</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Rp'. number_format($laporan['biaya_lain']['kantor'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['gaji'], 0,',','.') .'</td>
                                  <td>Rp'. number_format( $laporan['biaya_lain']['bonus'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['transport'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['listrik'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['keamanan'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['kesehatan'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['konsumsi'], 0,',','.')  .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['air'], 0,',','.')  .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['lain_lain'], 0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['biaya_lain']['biaya_lain'], 0,',','.') .'</td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                            <h5 class="card-title">Laba Rugi</h5><br>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  
                                  <th>Penjualan</th>
                                  <th>Bahan Baku</th>
                                  <th>TKTL</th>
                                  <th>HPP</th>
                                  <th>Biaya Lain</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Rp'.number_format($laporan['laba_rugi']['penjualan'], 0,',','.') .'</td>
                                  <td>Rp'.number_format($laporan['laba_rugi']['bahan_baku'], 0,',','.') .'</td>
                                  <td>Rp'.number_format($laporan['laba_rugi']['tktl'], 0,',','.') .'</td>
                                  <td>Rp'.number_format($laporan['laba_rugi']['hpp'], 0,',','.') .'</td>
                                  <td>Rp'.number_format($laporan['laba_rugi']['biaya_lain'], 0,',','.') .'</td>
                                  <td>Rp'.number_format($laporan['laba_rugi']['laba_rugi'], 0,',','.') .'</td>
                                </tr>
                              </tbody>
                            </table>
                            <h5 class="card-title">Neraca</h5><br>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Modal</th>
                                  <th>Laba Rugi</th>
                                  <th>Kas</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Rp'. number_format($laporan['neraca']['modal'],0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['neraca']['laba_rugi'],0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['neraca']['kas'],0,',','.') .'</td>
                                  <td>Rp'. number_format($laporan['neraca']['neraca'],0,',','.') .'</td>
                                </tr>
                              </tbody>
                            </table>
                            <h5 class="card-title">Pajak Pribadi</h5><br>
                            <table class="table table-striped" >
                              <thead>
                                <tr>
                                  <th>Bulan</th>
                                  <th>Penghasilan</th>
                                  <th>Pajak</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>Total</th>
                                  <th>Rp'. number_format($laporan['total_penghasilan']['penghasilan'],0,',','.') .'</th>
                                  <th>Rp'. number_format($laporan['total_pajak_pribadi']['pajak'],0,',','.') .'</th>
                                </tr>
                              </tfoot>
                              <tbody>
        ';
        foreach ($laporan['pajak_pribadi'] as $pp) {
            echo '<tr><td>'. $pp['bulan'] .'</td><td>Rp'. number_format($pp['penghasilan'],0,',','.') .'</td><td>Rp'. number_format($pp['pajak'],0,',','.') .'</td></tr>';
        }
        echo '</tbody></table>';
    }

}

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

		// data for table
		$data['data'] = $this->laporan_model->show(date('Y')-1);

		$this->db->select('tahun');
		$data['tahun'] = $this->db->get('neraca')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}
	
    function get_laporan($tahun)
    {
        $this->load->model('laporan_model');
        $data['data'] = $this->laporan_model->show($tahun);
        $laporan = $data['data'];
        echo '<h5 class="card-title text-center">Laporan Tahun '.$laporan['neraca']['tahun'].'</h5><br><h5 class="card-title">Pajak Badan</h5><br><table class="table table-striped table-head-bg-info"><thead><tr><th>Tahun</th><th>Bulan</th><th>Penjualan</th><th>Pajak</th></tr></thead><tfoot><tr><th>Total</th><th></th><th>'. $laporan['total_penjualan']['penjualan'] .'</th> <th>'. $laporan['total_pajak']['pajak'] .'</th></tr></tfoot><tbody>
        ';
        foreach ($laporan['pajak_badan'] as $pb) {
            echo '<tr><td>'. $pb['tahun'] .'</td><td>'. $pb['bulan'] .'</td><td>'. $pb['penjualan'] .'</td><td>'. $pb['pajak'] .'</td></tr>';
        }
        echo '
                              </tbody>
                            </table>
                            <h5 class="card-title">Biaya Lain</h5><br>
                            <table class="table table-striped table-head-bg-info">
                              <thead>
                                <tr>
                                  <th>Tahun</th>
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
                                  <td>'. $laporan['biaya_lain']['tahun'] .'</td>
                                  <td>'. $laporan['biaya_lain']['kantor'] .'</td>
                                  <td>'. $laporan['biaya_lain']['gaji'] .'</td>
                                  <td>'. $laporan['biaya_lain']['bonus'] .'</td>
                                  <td>'. $laporan['biaya_lain']['transport'] .'</td>
                                  <td>'. $laporan['biaya_lain']['listrik'] .'</td>
                                  <td>'. $laporan['biaya_lain']['keamanan'] .'</td>
                                  <td>'. $laporan['biaya_lain']['kesehatan'] .'</td>
                                  <td>'. $laporan['biaya_lain']['konsumsi'] .'</td>
                                  <td>'. $laporan['biaya_lain']['air'] .'</td>
                                  <td>'. $laporan['biaya_lain']['lain_lain'] .'</td>
                                  <td>'. $laporan['biaya_lain']['total'] .'</td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                            <h5 class="card-title">Laba Rugi</h5><br>
                            <table class="table table-striped table-head-bg-info">
                              <thead>
                                <tr>
                                  <th>Tahun</th>
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
                                  <td>'. $laporan['laba_rugi']['tahun'] .'</td>
                                  <td>'. $laporan['laba_rugi']['penjualan'] .'</td>
                                  <td>'. $laporan['laba_rugi']['bahan_baku'] .'</td>
                                  <td>'. $laporan['laba_rugi']['tktl'] .'</td>
                                  <td>'. $laporan['laba_rugi']['hpp'] .'</td>
                                  <td>'. $laporan['laba_rugi']['biaya_lain'] .'</td>
                                  <td>'. $laporan['laba_rugi']['total'] .'</td>
                                </tr>
                              </tbody>
                            </table>
                            <h5 class="card-title">Neraca</h5><br>
                            <table class="table table-striped table-head-bg-info">
                              <thead>
                                <tr>
                                  <th>Tahun</th>
                                  <th>Modal</th>
                                  <th>Laba Rugi</th>
                                  <th>Kas</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>'. $laporan['neraca']['tahun'] .'</td>
                                  <td>'. $laporan['neraca']['modal'] .'</td>
                                  <td>'. $laporan['neraca']['laba_rugi'] .'</td>
                                  <td>'. $laporan['neraca']['kas'] .'</td>
                                  <td>'. $laporan['neraca']['total'] .'</td>
                                </tr>
                              </tbody>
                            </table>
                            <h5 class="card-title">Pajak Pribadi</h5><br>
                            <table class="table table-striped table-head-bg-info" >
                              <thead>
                                <tr>
                                  <th>Tahun</th>
                                  <th>Bulan</th>
                                  <th>Penghasilan</th>
                                  <th>Pajak</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>Total</th>
                                  <th></th>
                                  <th>'. $laporan['total_penghasilan']['penghasilan'] .'</th>
                                  <th>'. $laporan['total_pajak']['pajak'] .'</th>
                                </tr>
                              </tfoot>
                              <tbody>
        ';
        foreach ($laporan['pajak_pribadi'] as $pp) {
            echo '<tr><td>'. $pp['tahun'] .'</td><td>'. $pp['bulan'] .'</td><td>'. $pp['penghasilan'] .'</td><td>'. $pp['pajak'] .'</td></tr>';
        }
        echo '</tbody></table>';
    }

}

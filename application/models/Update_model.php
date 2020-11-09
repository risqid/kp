<?php
class Update_model extends CI_Model {

	public function update_labarugi($tahun)
	{
		// check if data is exist
		$year_exist = $this->db->get_where('laba_rugi', ['tahun' => $thaun])->row_array();

		if ($year_exist) {
			// get penjualan
			$this->db->select_sum('penjualan');
			$total_penjualan = $this->db->get_where('pajak_badan', ['tahun' => $tahun])->row_array();
			// get biaya lain
			$this->db->select('total');
			$total_biaya_lain = $this->db->get_where('biaya_lain', ['tahun' => $tahun])->row_array();
			$penjualan = $total_penjualan['penjualan'];
			$bahan_baku = $penjualan * 0.8;
			$tktl = $bahan_baku + 24000000;
			$hpp = $penjualan - $tktl;
			$biaya_lain = $total_biaya_lain['total'];
			$total = $hpp - $biaya_lain;
			$data_update = [
				'penjualan' => $penjualan,
				'bahan_baku' => $bahan_baku ,
				'tktl' => $tktl,
				'hpp' => $hpp,
				'biaya_lain' => $biaya_lain,
				'total' => $total
			];
			$this->db->where('tahun', $tahun);
			$this->db->update('laba_rugi', $data_update);
			// check apakah data dengan tahun $tahun kosong
			$this->db->select('tahun');
			$tahun_pajak = $this->db->get_where('pajak_badan', ['tahun' => $tahun])->result_array();
			$this->db->select('tahun');
			$tahun_biayalain = $this->db->get_where('biaya_lain', ['tahun' => $tahun])->result_array();
			if (count($tahun_pajak) == 0 && count($tahun_biayalain) == 0) {
				$this->db->delete('laba_rugi', ['tahun' =>$tahun]);
				$this->db->delete('neraca', ['tahun' => $tahun]);
			}
		}
	}

	public function update_neraca($tahun)
	{
		// check if data is exist
		$year_exist = $this->db->get_where('neraca', ['tahun' => $thaun])->row_array();

		if ($year_exist) {
			// get labarugi
			$this->db->select('total');
			$result = $this->db->get_where('laba_rugi', ['tahun' => $tahun])->row_array();
			$laba_rugi = $result['total'];
			$modal = 50000000;
			$kas = $modal + $laba_rugi;
			$neraca = $modal + $laba_rugi;
			$data_update_neraca = [
				'laba_rugi' => $laba_rugi,
				'kas' => $kas,
				'total' => $neraca
			];
			$this->db->where('tahun', $tahun);
			$this->db->update('neraca', $data_update_neraca);
			// check apakah data dengan tahun $tahun kosong
			$this->db->select('tahun');
			$tahun_pajak = $this->db->get_where('pajak_badan', ['tahun' => $tahun])->result_array();
			$this->db->select('tahun');
			$tahun_biayalain = $this->db->get_where('biaya_lain', ['tahun' => $tahun])->result_array();
			$this->db->select('tahun');
			$tahun_labarugi = $this->db->get_where('laba_rugi', ['tahun' => $tahun])->result_array();
			if (count($tahun_pajak) == 0 && count($tahun_biayalain) == 0 || count($tahun_labarugi) == 0) {
				$this->db->delete('laba_rugi', ['tahun' =>$tahun]);
				$this->db->delete('neraca', ['tahun' => $tahun]);
			}
		}
	}
}
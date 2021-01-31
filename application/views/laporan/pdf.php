<?php
tcpdf();

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {

		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 20, 'Laporan Keuangan CV Surya Jaya Tehnik', 0, false, 'C', 0, '', 0, false, '', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

$obj_pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Laporan Keuangan";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
    // we can have any view part here like HTML, PHP etc
    echo "<h1>Tahun ". $tahun."</h1>";
	echo "<h2>Pajak Badan</h2><br>";
	echo '<table border="1" cellpadding="3"><thead><tr><th><strong>Bulan</strong></th><th><strong>Penjualan</strong></th><th><strong>Pajak</strong></th></tr></thead><tbody>';
	foreach ($laporan['pajak_badan'] as $pb) {
    echo '<tr><td>'. $pb['bulan'] .'</td><td>Rp'. number_format($pb['penjualan'], 0,',','.') .'</td><td>Rp'. number_format($pb['pajak'], 0,',','.') .'</td></tr>';}
    echo '</tbody><tfoot><tr><th><strong>Total</strong></th><th><strong>Rp'. number_format($laporan['total_penjualan']['penjualan'],0,',','.')  .'</strong></th><th><strong>Rp'. number_format($laporan['total_pajak']['pajak'],0,',','.')  .'</strong></th></tr></tfoot></table><hr>';
    echo "<h2>Pajak Pribadi</h2>";
    echo '<table border="1" cellpadding="3"><thead><tr><th><strong>Bulan</strong></th><th><strong>Penghasilan</strong></th><th><strong>Pajak</strong></th></tr></thead><tbody>';
    foreach ($laporan['pajak_pribadi'] as $pp) {
    	echo '<tr><td>'. $pp['bulan'] .'</td><td>Rp'. number_format($pp['penghasilan'],0,',','.') .'</td><td>Rp'. number_format($pp['pajak'],0,',','.') .'</td></tr>';
        }
    echo '</tbody><tfoot><tr><th><strong>Total</strong></th><th><strong>Rp'. number_format($laporan['total_penghasilan']['penghasilan'],0,',','.') .'</strong></th><th><strong>Rp'. number_format($laporan['total_pajak_pribadi']['pajak'],0,',','.') .'</strong></th></tr></tfoot></table><hr>';
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->AddPage();
ob_start();
    // we can have any view part here like HTML, PHP etc
	echo "<h1>Tahun ". $tahun."</h1>";
	echo "<h2>Biaya Lain</h2>";
    echo '<table cellpadding="3"><thead></thead><tbody><tr><td>Kantor</td><td>Rp'. number_format($laporan['biaya_lain']['kantor'],0,',','.').'</td></tr><tr><td>Gaji</td><td>Rp'. number_format($laporan['biaya_lain']['gaji'],0,',','.').'</td></tr><tr><td>Bonus</td><td>Rp'. number_format($laporan['biaya_lain']['bonus'],0,',','.').'</td></tr><tr><td>Transport</td><td>Rp'. number_format($laporan['biaya_lain']['transport'],0,',','.').'</td></tr><tr><td>Listrik</td><td>Rp'. number_format($laporan['biaya_lain']['listrik'],0,',','.').'</td></tr><tr><td>Keamanan</td><td>Rp'. number_format($laporan['biaya_lain']['keamanan'],0,',','.').'</td></tr><tr><td>Kesehatan</td><td>Rp'. number_format($laporan['biaya_lain']['kesehatan'],0,',','.').'</td></tr><tr><td>Konsumsi</td><td>Rp'. number_format($laporan['biaya_lain']['konsumsi'],0,',','.').'</td></tr><tr><td>Air</td><td>Rp'. number_format($laporan['biaya_lain']['air'],0,',','.').'</td></tr><tr><td>Lain-lain</td><td>Rp'. number_format($laporan['biaya_lain']['lain_lain'],0,',','.').'</td></tr><hr><tr><td><strong>Total</strong></td><td><strong>Rp'. number_format($laporan['biaya_lain']['biaya_lain'],0,',','.').'</strong></td></tr><hr>';
    echo "<h2>Laba Rugi</h2>";
    echo '<table cellpadding="3"><thead></thead><tbody><tr><td>Penjualan</td><td>Rp'. number_format($laporan['laba_rugi']['penjualan'],0,',','.').'</td></tr><tr><td>Bahan Baku</td><td>Rp'. number_format($laporan['laba_rugi']['bahan_baku'],0,',','.').'</td></tr><tr><td>TKTL</td><td>Rp'. number_format($laporan['laba_rugi']['tktl'],0,',','.').'</td></tr><tr><td>HPP</td><td>Rp'. number_format($laporan['laba_rugi']['hpp'],0,',','.').'</td></tr><tr><td>Biaya Lain</td><td>Rp'. number_format($laporan['laba_rugi']['biaya_lain'],0,',','.').'</td></tr><hr><tr><td><strong>Laba Rugi</strong></td><td><strong>Rp'. number_format($laporan['laba_rugi']['laba_rugi'],0,',','.').'</strong></td></tr><hr>';
    echo "<h2>Neraca</h2>";
    echo '<table cellpadding="3"><thead></thead><tbody><tr><td>Modal</td><td>Rp'. number_format($laporan['neraca']['modal'],0,',','.').'</td></tr><tr><td>Laba Rugi</td><td>Rp'. number_format($laporan['neraca']['laba_rugi'],0,',','.').'</td></tr><tr><td>Kas</td><td>Rp'. number_format($laporan['neraca']['kas'],0,',','.').'</td></tr><hr><tr><td><strong>Neraca</strong></td><td><strong>Rp'. number_format($laporan['neraca']['neraca'],0,',','.').'</strong></td></tr><hr>';
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('laporan keuangan tahun '.$tahun.'.pdf', 'I');
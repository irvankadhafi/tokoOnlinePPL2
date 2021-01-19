<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;
use App\Models\OngkirModel;
use App\Models\PenjualanModel;
use App\Models\ProductModel;
use App\Models\ProsesJualModel;
use Wildanfuady\WFcart\WFcart;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PenjualanController extends BaseController
{
    public function __construct()
    {
        $this->penjualan = new PenjualanModel();
        $this->proses_jual = new ProsesJualModel();
        $this->product = new ProductModel();
        $this->ongkir = new OngkirModel();
        $this->cart = new WFcart();
        helper('form');
        helper('date');
    }

    public function customerForm()
    {
        $data['ongkir'] = $this->ongkir->findAll();
        return view('shop/v_customer_form',$data);
    }

    public function orderConfirm()
    {
        if($this->request->getMethod() == 'post'){
            $session = session('cart');
            $ongkir = $this->ongkir->getKecamatan($this->request->getPost('cus_kecamatan'));
            $biaya_ongkir = $ongkir['biaya_ongkir_kg'];

            //Hitung Ongkir dan Pembulatan
            $total_berat = $this->cart->count_weight()/1000;
            $totalBeratOld = $total_berat;
            $berat_sisa = $total_berat;
            $tambahin = 1.0;
            while($berat_sisa > 1){
                $berat_sisa = $berat_sisa - 1;
            }
            if($berat_sisa == 1){
                $biaya_ongkir = $biaya_ongkir * $total_berat;
            }else if ($berat_sisa > 0.3) {
                $tambahin = $tambahin - $berat_sisa;
                $total_berat = $total_berat + $tambahin;
                $biaya_ongkir = $biaya_ongkir*$total_berat;
            } else {
                $total_berat = $total_berat - $berat_sisa;
                $biaya_ongkir = $biaya_ongkir*$total_berat;
            }
            $data =[
                'items' => $this->cart->totals(),
                'total' => $this->cart->count_totals(),
                'total_weight' => $this->cart->count_weight(),
                'total_weight_pembulatan' => $total_berat,
                'total_ongkir'=>$biaya_ongkir,
                'total_semua'=>$biaya_ongkir+$this->cart->count_totals(),
                'biaya_ongkir'=>$ongkir['biaya_ongkir_kg'],
                'total_array'=> is_array($session)? array_values($session): array(),
                'idtrx'=>$this->idPenjualan(),
                'penerima'=>$this->request->getPost('cus_name'),
                'alamat'=>$this->request->getPost('cus_address'),
                'kecamatan'=>$ongkir['kecamatan_tujuan'],
                'kota'=>$this->request->getPost('cus_city'),
                'nohp'=>$this->request->getPost('cus_phone'),
            ];
            return view('shop/v_checkout', $data);
        }else{
            return redirect()->to('/customer/form');
        }
    }
    //Mengembalikan id penjualan dengan prefix TRX
    public function idPenjualan()
    {
        $new_id = $this->penjualan->get_idmax();
        if ($new_id>0){
            foreach ($new_id as $key){
                $auto_id = $key->id;
            }
        }
        return $this->penjualan->get_newid($auto_id,'TRX'); //TRX00001
    }

    public function exportPDFPenjualan()
	{
		$data = [
			'pdf_penjualan' => $this->penjualan->getDataPenjualan()
		];
		$html = view('export/pdf', $data);
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('penjualan.pdf', 'I');

	}

	public function exportXLSPenjualan()
	{
		$dataPenjualan = $this->penjualan->getDataPenjualan();
		$spreadsheet = new Spreadsheet();

		// Membuat header kolom
		$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A1', 'ID Transaksi')
					->setCellValue('B1', 'Nama')
					->setCellValue('C1', 'Total Ongkir')
					->setCellValue('D1', 'Total Harga Barang')
					->setCellValue('E1', 'Waktu');

		// Write data penjualan ke cell
		$column = 2;
		foreach($dataPenjualan as $data) {
			$spreadsheet->setActiveSheetIndex(0)
						->setCellValue('A' . $column, $data['id'])
						->setCellValue('B' . $column, $data['nama_pembeli'])
						->setCellValue('C' . $column, $data['total_harga_ongkir'])
						->setCellValue('D' . $column, $data['total_harga_barang'])
						->setCellValue('E' . $column, $data['waktu_transaksi']);
			$column++;
		}

		// Writing dalam format .xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName = 'Data Penjualan';

		// Redirect hasil generate xlsx ke web client
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}

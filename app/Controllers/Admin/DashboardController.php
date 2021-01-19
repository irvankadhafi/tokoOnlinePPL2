<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PenjualanModel;
use App\Models\ProductModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends BaseController
{
	public function __construct()
	{
		$this->product = new ProductModel();
		$this->penjualan = new PenjualanModel();
	}
	public function index()
	{
		return view('admin/v_home');
    }

    public function createProduct()
	{
		return view('admin/v_add_product');
    }

    public function listProduct()
	{
		$data['items'] = $this->product->findAll();
		return view('admin/v_list_product', $data);
	}

	public function listPenjualan()
	{
		$data['items'] = $this->penjualan->getDataPenjualan();
		return view('admin/v_list_penjualan', $data);
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

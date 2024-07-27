<?php

namespace App\Http\Controllers;

use App\Models\OrderReturn;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportOrderReturnList extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $orders = OrderReturn::all();

        /**
         * Header set
         */
        $sheet->setTitle('Order Return By Arwin');
        $sheet->setCellValue('A1', 'STATUS');
        $sheet->setCellValue('B1', 'ORDER NUMBER');
        $sheet->setCellValue('C1', 'CUSTOMER');
        $sheet->setCellValue('D1', 'RETAILER');
        $sheet->setCellValue('E1', 'PHONE');
        $sheet->setCellValue('F1', 'EMAIL');
        $sheet->setCellValue('G1', 'ADDRESS');
        $sheet->setCellValue('H1', 'REASON');
        $sheet->setCellValue('I1', 'DATE CREATED');

        /**
         * Loop thru the content
         */
        $row = 2;
        foreach ($orders as $order) {
            $sheet->setCellValue('A' . $row, $order->status);
            $sheet->setCellValue('B' . $row, $order->order_number);
            $sheet->setCellValue('C' . $row, $order->customer->full_name);
            $sheet->setCellValue('D' . $row, $order->customer->retailer_name);
            $sheet->setCellValue('E' . $row, $order->customer->phone);
            $sheet->setCellValue('F' . $row, $order->customer->email);
            $sheet->setCellValue('G' . $row, $order->customer->address->addressConventionName);
            $sheet->setCellValue('H' . $row, $order->reason->reason);
            $sheet->setCellValue('I' . $row, $order->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = date('Y-m-d') ."_Order_Return_Exported.xlsx";
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        $writer->save("php://output");
        
        // Session::flash('export.done', 'exprt is done');
        exit();
        return redirect()->back();
    }
}

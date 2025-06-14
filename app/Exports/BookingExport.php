<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Carbon\Carbon;

class BookingExport implements 
    FromCollection, 
    WithHeadings, 
    WithMapping, 
    WithColumnFormatting, 
    WithStyles, 
    ShouldAutoSize, 
    WithEvents, 
    WithCustomStartCell
{
    protected $totalHarga;

    public function collection()
    {
        $data = Booking::all();
        $this->totalHarga = $data->sum('total_price');

        return $data;
    }

    public function headings(): array
    {
        return [
            'Mobil',
            'Nama Pelanggan',
            'Email',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Total Harga',
            'Status Pembayaran',
            'Metode Pembayaran',
        ];
    }

    public function map($booking): array
    {
        return [
            $booking->car_title,
            $booking->customer_name,
            $booking->customer_email,
            Carbon::parse($booking->rental_start_date)->format('d-m-Y'),
            Carbon::parse($booking->rental_end_date)->format('d-m-Y'),
            $booking->total_price,
            ucfirst($booking->payment_status),
            ucfirst($booking->payment_method),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => '#,##0',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            4 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'C9D9FF'],
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '999999'],
                    ],
                ],
            ],
        ];
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Logo
                $drawing = new Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('San Rental');
                $drawing->setPath(public_path('frontend/images/sans.png'));
                $drawing->setHeight(50);
                $drawing->setCoordinates('A1');
                $drawing->setWorksheet($sheet);

                // Judul
                $sheet->mergeCells('B1:H2');
                $sheet->setCellValue('B1', 'San Rental - Laporan Data Booking');
                $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(16);
                $sheet->getStyle('B1')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // Tanggal Cetak
                $sheet->setCellValue('H3', 'Dicetak: ' . Carbon::now()->format('d-m-Y'));
                $sheet->getStyle('H3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle('H3')->getFont()->setItalic(true)->setSize(10);

                // Jumlah baris data
                $dataCount = Booking::count();
                $startRow = 5;
                $endRow = $startRow + $dataCount - 1;

                // Border seluruh tabel
                $range = 'A4:H' . $endRow;
                $sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'CCCCCC'],
                        ],
                    ],
                ]);

                // Zebra striping (warna selang-seling)
                for ($i = $startRow; $i <= $endRow; $i++) {
                    if ($i % 2 == 0) {
                        $sheet->getStyle("A$i:H$i")->applyFromArray([
                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'startColor' => ['rgb' => 'F5F5F5'],
                            ],
                        ]);
                    }
                }

                // Total Harga
                $totalRow = $endRow + 2;
                $sheet->setCellValue("E$totalRow", 'Total Harga');
                $sheet->setCellValue("F$totalRow", $this->totalHarga);
                $sheet->getStyle("E$totalRow")->getFont()->setBold(true)->setSize(12);
                $sheet->getStyle("F$totalRow")->getFont()->setBold(true)->setSize(12);
                $sheet->getStyle("F$totalRow")->getNumberFormat()->setFormatCode('#,##0');
            },
        ];
    }
}

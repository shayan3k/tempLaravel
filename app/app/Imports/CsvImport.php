<?php

namespace App\Imports;
use App\lib\Jdf;
use App\User;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class CsvImport implements FromCollection, WithMapping,WithHeadings,ShouldAutoSize, WithEvents
{
    use Exportable;

   /* public function __construct(int $id)
    {
        $this->id = $id;
    }
*/
    public function collection()
    {
        return User::get();
    }

    public function map($value): array
    {
        $jdf = new Jdf();
    
	 if($value->verify==1)
	 {
		 $f = 'فعال';
	 }else{
		 $f = 'غیرفعال';
	 }
	 
        return [
             $value->fname,
			 $value->lname,
            $jdf->jdate("Y/n/j",$value->date),
			$value->username,
            $f
        ];
    }
    private $headings = [
        'نام',
        'نام خانوادگی',
        'تاریخ ثبت',
        'شماره همراه',
		'وضعیت'
    ];
    public function headings(): array
    {
        return $this->headings;
    }

    public function registerEvents(): array
    {
        $styleArray = ['font' => ['bold' => true]];
        return [
            AfterSheet::class =>

                function (AfterSheet $event) use ($styleArray) {

                    // bold heading
                    $event->sheet->getStyle('A1:J1')

                        ->applyFromArray($styleArray);

                    // change direction to rtl
                    $event->sheet->setRightToLeft(true);
                    // center all text
                    $event->sheet->autoSize(true);


                },
        ];
    }
}

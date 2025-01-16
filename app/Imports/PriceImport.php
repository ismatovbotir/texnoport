<?php

namespace App\Imports;

use App\Models\Price;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PriceImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $trans=Transaction::create();
        //dd($trans);
        foreach($rows as $row)
        {
            //dd($row);
            $product=Product::firstOrCreate(
                        ['sap'=>$row['kod_tovara']],
                        ['name'=>$row['naimenovanie_tovara'],'group' => $row['nazvanie_gruppy'], 'department' => $row['otdel'],]
            );
            Price::create([
                'price'=>$row['pos_cena'],
                'product_id'=>$product->id,
                'transaction_id'=>$trans->id
            ]);
        }
       
    }
}

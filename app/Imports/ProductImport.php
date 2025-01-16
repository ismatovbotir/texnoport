<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Price;
use App\Models\Transaction;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row 
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $trans = Transaction::create();
        //dd($trans);
        foreach ($rows as $row) {
            
            //dd($row);
            $product = Product::firstOrCreate(
                ['id' => $row['id']],
                [
                    'id' => $row['id'],
                    'sap' => $row['sap'],
                    'name' => $row['name'],

                ]
            );
            if($row['price']>0){

                Price::create([
                    'price' => $row['price'],
                    'product_id' => $product->id,
                    'transaction_id' => $trans->id
                ]);
            }



           
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Let's truncate our existing records to start from scratch.
        Currency::truncate();

        $response = Http::get('http://www.cbr.ru/scripts/XML_daily.asp');
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        // echo $res->getStatusCode(); // 200
        $json_string = json_encode($xml);
        $array = json_decode($json_string,TRUE);


        $date = $array['@attributes']['Date'];
        $valute = $array['Valute'];
        foreach ($valute as $key => $value) {
            $APIID = $value['@attributes']['ID'];
            $NumCode = $value['NumCode'];
            $CharCode = $value['CharCode'];
            $Name = $value['Name'];
            $Nominal = $value['Nominal'];
            $Value = $value['Value'];
            // create instance into the database 
            Currency::create([
                'ApiId' => $APIID,
                'Name' => $Name,
                'NumCode' => $NumCode,
                'CharCode' => $CharCode,
                'Nominal' => $Nominal,
                'Value' => $Value,
                'Date' => $date,
            ]);
        }
    }
}

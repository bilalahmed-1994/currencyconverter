<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class ImportCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ImportCurrencyRates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports Currency Rates From xml API {http://www.cbr.ru/scripts/XML_daily.asp}';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('http://www.cbr.ru/scripts/XML_daily.asp');
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        // echo $res->getStatusCode(); // 200
        $json_string = json_encode($xml);
        $array = json_decode($json_string,TRUE);


        $date = $array['@attributes']['Date'];
        $valute = $array['Valute'];
        $count = 0;
        foreach ($valute as $key => $value) {
            $APIID = $value['@attributes']['ID'];
            $NumCode = $value['NumCode'];
            $CharCode = $value['CharCode'];
            $Name = $value['Name'];
            $Nominal = $value['Nominal'];
            $Value = $value['Value'];

            $this->info('Adding record for '. $APIID);
            // $this->info('Adding record for NumCode:'. $NumCode);
            // $this->info('Adding record for CharCode:'. $CharCode);
            // $this->info('Adding record for Nominal:'. $Nominal);
            // $this->info('Adding record for Value:'. $Value);
            // $this->info('Adding record for Name:'. $Name);
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
            $count++;
        }
        $this->info($count . " records added!");
        return 0;
    }
}

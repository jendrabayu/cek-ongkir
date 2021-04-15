<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Storage::exists('seeds/provinces.json')) {

            $response = Http::withHeaders(['key' => '206cc2aef17ad58f99012341e0759692'])->get('https://api.rajaongkir.com/starter/province');

            if ($response->ok()) {
                $response = $response['rajaongkir']['results'];
                $provinces = [];
                foreach ($response as $item) {
                    array_push($provinces, [
                        'code' => $item['province_id'],
                        'title' => $item['province']
                    ]);
                }

                Storage::put('seeds/provinces.json', json_encode($provinces));
            }

            $response->throw();
        }

        $provinces = json_decode(Storage::get('seeds/provinces.json'), true);
        Province::insert($provinces);
    }
}

<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Storage::exists('seeds/cities.json')) {

            $response = Http::withHeaders(['key' => '206cc2aef17ad58f99012341e0759692'])
                ->get('https://api.rajaongkir.com/starter/city');

            if ($response->ok()) {
                $response = $response['rajaongkir']['results'];
                $cities = [];
                foreach ($response as $item) {
                    array_push($cities, [
                        'code' => $item['city_id'],
                        'title' => $item['city_name'],
                        'province_code' => $item['province_id']
                    ]);
                }

                Storage::put('seeds/cities.json', json_encode($cities));
            }
        }

        $cities = json_decode(Storage::get('seeds/cities.json'), true);
        City::insert($cities);
    }
}

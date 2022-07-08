<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => '2a04b862a09c3a519a176c07817d9a77'
        ])->get('https://api.rajaongkir.com/starter/city?province=6'); 
        $data = $response->json();
        $cities = $data['rajaongkir']['results'];
        foreach ($cities as $city) {
            $data_city[] = [
                'id' => $city['city_id'],
                'name' => $city['city_name']
            ];
        }

        City::insert($data_city);
    }
}

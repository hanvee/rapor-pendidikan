<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Subdistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all();
        foreach ($cities as $city) {
            $response = Http::withHeaders([
                'key' => '2a04b862a09c3a519a176c07817d9a77'
            ])->get("https://pro.rajaongkir.com/api/subdistrict?city={$city->id}"); 
            $data = $response->json();
            $subdistricts = $data['rajaongkir']['results'];


            foreach ($subdistricts as $subdistrict) {
                $data_subdistrict[] = [
                    'id' => $subdistrict['subdistrict_id'],
                    'city_id' => $city->id,
                    'name' => $subdistrict['subdistrict_name']
                ];
            }

        }

        Subdistrict::insert($data_subdistrict);
    }
}

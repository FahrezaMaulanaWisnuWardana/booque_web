<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->insert(
             array (
                  array (
                    'id' => 1,
                    'province_name' => 'Provinsi Aceh',
                  ),
                  array (
                    'id' => 2,
                    'province_name' => 'Provinsi Sumatera Utara',
                  ),
                  array (
                    'id' => 3,
                    'province_name' => 'Provinsi Sumatera Barat',
                  ),
                  array (
                    'id' => 4,
                    'province_name' => 'Provinsi Riau',
                  ),
                  array (
                    'id' => 5,
                    'province_name' => 'Provinsi Jambi',
                  ),
                  array (
                    'id' => 6,
                    'province_name' => 'Provinsi Sumatera Selatan',
                  ),
                  array (
                    'id' => 7,
                    'province_name' => 'Provinsi Bengkulu',
                  ),
                  array (
                    'id' => 8,
                    'province_name' => 'Provinsi Lampung',
                  ),
                  array (
                    'id' => 9,
                    'province_name' => 'Provinsi Kepulauan Bangka Belitung',
                  ),
                  array (
                    'id' => 10,
                    'province_name' => 'Provinsi Kepulauan Riau',
                  ),
                  array (
                    'id' => 11,
                    'province_name' => 'Provinsi DKI Jakarta',
                  ),
                  array (
                    'id' => 12,
                    'province_name' => 'Provinsi Jawa Barat',
                  ),
                  array (
                    'id' => 13,
                    'province_name' => 'Provinsi Jawa Tengah',
                  ),
                  array (
                    'id' => 14,
                    'province_name' => 'Provinsi DI Yogyakarta',
                  ),
                  array (
                    'id' => 15,
                    'province_name' => 'Provinsi Jawa Timur',
                  ),
                  array (
                    'id' => 16,
                    'province_name' => 'Provinsi Banten',
                  ),
                  array (
                    'id' => 17,
                    'province_name' => 'Provinsi Bali',
                  ),
                  array (
                    'id' => 18,
                    'province_name' => 'Provinsi Nusa Tenggara Barat',
                  ),
                  array (
                    'id' => 19,
                    'province_name' => 'Provinsi Nusa Tenggara Timur',
                  ),
                  array (
                    'id' => 20,
                    'province_name' => 'Provinsi Kalimantan Barat',
                  ),
                  array (
                    'id' => 21,
                    'province_name' => 'Provinsi Kalimantan Tengah',
                  ),
                  array (
                    'id' => 22,
                    'province_name' => 'Provinsi Kalimantan Selatan',
                  ),
                  array (
                    'id' => 23,
                    'province_name' => 'Provinsi Kalimantan Timur',
                  ),
                  array (
                    'id' => 24,
                    'province_name' => 'Provinsi Sulawesi Utara',
                  ),
                  array (
                    'id' => 25,
                    'province_name' => 'Provinsi Sulawesi Tengah',
                  ),
                  array (
                    'id' => 26,
                    'province_name' => 'Provinsi Sulawesi Selatan',
                  ),
                  array (
                    'id' => 27,
                    'province_name' => 'Provinsi Sulawesi Tenggara',
                  ),
                  array (
                    'id' => 28,
                    'province_name' => 'Provinsi Gorontalo',
                  ),
                  array (
                    'id' => 29,
                    'province_name' => 'Provinsi Sulawesi Barat',
                  ),
                  array (
                    'id' => 30,
                    'province_name' => 'Provinsi Maluku',
                  ),
                  array (
                    'id' => 31,
                    'province_name' => 'Provinsi Maluku Utara',
                  ),
                  array (
                    'id' => 32,
                    'province_name' => 'Provinsi Papua Barat',
                  ),
                  array (
                    'id' => 33,
                    'province_name' => 'Provinsi Papua',
                  ),
                )
        );
    }
}

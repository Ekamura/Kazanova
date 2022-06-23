<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpetificSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specifications')->insert([
            ['name'=>'Материал'],
            ['name'=>'Объём (л)'],
            ['name'=>'Крышка'],
            ['name'=>'Толщина стенки'],
            ['name'=>'Верхний диаметр (мм)'],
            ['name'=>'Дно внутри'],
            ['name'=>'Дно снаружи'],
            ['name'=>'Тип казана'],
            ['name'=>'Глубина казана'],
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characteristics')->insert([
            ['value' => '4 л'],
            ['value' => '4.5 л'],
            ['value' => '6 л'],
            ['value' => '8 л'],
            ['value' => '30л'],
            ['value'=>'Чугун'],
            ['value'=>'Алюминиевая'],
            ['value'=>5],
            ['value'=>340],
            ['value'=>'Полусфера'],
            ['value'=>'Плоское'],
            ['value'=>'140 мм.'],


        ]);
    }
}

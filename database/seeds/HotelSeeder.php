<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            'name' => 'Double Queen',
            'descriptions' => 'Double Queen Description',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('room_types')->insert([
            'name' => 'King Size',
            'descriptions' => 'King Size Description',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('room_types')->insert([
            'name' => 'Queen Suite',
            'descriptions' => 'Queen Suite Description',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 101,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 102,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 202,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 203,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 301,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 302,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('discounts')->insert([
            'name' => 'Super Saver Special',
            'code' => 'super',
            'discount' => 5000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('discounts')->insert([
            'name' => 'The Boss Saver Special',
            'code' => 'boss',
            'discount' => 2000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rates')->insert([
            'value' => 10000,
            'room_type_id' => 1,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('retes')->insert([
            'value' => 20000,
            'room_type_id' => 2,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('retes')->insert([
            'value' => 5000,
            'room_type_id' => 2,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('retes')->insert([
            'value' => 15000,
            'room_type_id' => 3,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}

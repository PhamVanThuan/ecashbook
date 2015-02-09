<?php

use Illuminate\Database\Seeder;

class TransaksiTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi')->truncate();

        $transaksi = [
            ['uraian' => 'Kas di Bank', 'status' => 'Debet', 'jumlah' => '5000000'],
            ['uraian' => 'Kas ditangan', 'status' => 'Debet', 'jumlah' => '1500000'],
        ];

        DB::table('transaksi')->insert($transaksi);
    }

}

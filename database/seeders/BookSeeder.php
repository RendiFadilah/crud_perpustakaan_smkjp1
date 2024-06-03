<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'image' => 'foto1.jpg',
                'title' => 'Buku Sejarah',
                'penerbit' => 'Erlangga',
                'description' => 'Buku untuk mempelajari Sejarah Indonesia',
                'price' => 150000,
                'stock' => 5,
            ],
            [
                'image' => 'foto2.jpg',
                'title' => 'Web Developer',
                'penerbit' => 'Rendi Coding',
                'description' => 'Buku untuk mempelajari HTML, CSS, Javascript',
                'price' => 350000,
                'stock' => 10,
            ]
        ]);
    }
}

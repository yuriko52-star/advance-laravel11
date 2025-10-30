<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'author_id' => '1',
            'title' => 'De Bello Gallico',
        ];
        DB::table('books')->insert($param);
        $param = [
            'author_id' => '2',
            'title' => 'Epistrae ad Lucini',
        ];
        DB::table('books')->insert($param);
        $param = [
            'author_id' => '3',
            'title' => 'De Vitae',
        ];
        DB::table('books')->insert($param);
        $param = [
            'author_id' => '4',
            'title' => '魏志倭人伝',
        ];
        DB::table('books')->insert($param);
    }
}

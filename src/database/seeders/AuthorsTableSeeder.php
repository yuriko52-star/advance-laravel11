<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$param = [
            'name' => 'caesar',
            'age' => 56,
            'nationality' => 'Italian',
        ];
        DB::table('authors')->insert($param);
    
        $param = [
            'name' => 'seneka',
            'age' => 53,
            'nationality' => 'Spanish',
        ];
        DB::table('authors')->insert($param);
        $param = [
            'name' => 'patra',
            'age' =>39,
            'nationality' => 'Egyptian',
        ];
        DB::table('authors')->insert($param);
        $param = [
            'name' => 'himiko',
            'age' => 33,
            'nationality' => 'japanese',
        ];
        DB::table('authors')->insert($param);
        */
        Author::factory()->count(5)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'personID' => 1],
            ['id' => 2, 'personID' => 2],
            ['id' => 3, 'personID' => 3],
            ['id' => 4, 'personID' => 4],
            ['id' => 5, 'personID' => 5],
            ['id' => 6, 'personID' => 6],
            ['id' => 7, 'personID' => 7],
            ['id' => 8, 'personID' => 8],
            ['id' => 9, 'personID' => 9],
            ['id' => 10, 'personID' => 10],
            ['id' => 11, 'personID' => 11],
            ['id' => 12, 'personID' => 12],
            ['id' => 13, 'personID' => 13],
            ['id' => 14, 'personID' => 14],
            ['id' => 15, 'personID' => 15],
            ['id' => 16, 'personID' => 16],
            ['id' => 17, 'personID' => 17],
            ['id' => 18, 'personID' => 18],
            ['id' => 19, 'personID' => 19],
            ['id' => 20, 'personID' => 20],
            ['id' => 21, 'personID' => 21],
            ['id' => 22, 'personID' => 22],
            ['id' => 23, 'personID' => 23],
            ['id' => 24, 'personID' => 24],
            ['id' => 25, 'personID' => 25],
            ['id' => 26, 'personID' => 26],
            ['id' => 27, 'personID' => 27],
            ['id' => 28, 'personID' => 28],
            ['id' => 29, 'personID' => 29],
            ['id' => 30, 'personID' => 30],
            ['id' => 31, 'personID' => 31],
            ['id' => 32, 'personID' => 32],
            ['id' => 33, 'personID' => 33],
            ['id' => 34, 'personID' => 34],
            ['id' => 35, 'personID' => 35],
            ['id' => 36, 'personID' => 36],
            ['id' => 37, 'personID' => 37],
            ['id' => 38, 'personID' => 38],
            ['id' => 39, 'personID' => 39],
            ['id' => 40, 'personID' => 40],
            ['id' => 41, 'personID' => 41],
            ['id' => 42, 'personID' => 42],
            ['id' => 43, 'personID' => 43],
            ['id' => 44, 'personID' => 44],
            ['id' => 45, 'personID' => 45],
            ['id' => 46, 'personID' => 46],
            ['id' => 47, 'personID' => 47],
            ['id' => 48, 'personID' => 48],
            ['id' => 49, 'personID' => 49],
            ['id' => 50, 'personID' => 50],
            ['id' => 51, 'personID' => 51],
            ['id' => 52, 'personID' => 52],
            ['id' => 53, 'personID' => 53],
            ['id' => 54, 'personID' => 54],
            ['id' => 55, 'personID' => 55],
            ['id' => 56, 'personID' => 56],
            ['id' => 57, 'personID' => 57],
            ['id' => 58, 'personID' => 58],
            ['id' => 59, 'personID' => 59],
            ['id' => 60, 'personID' => 60],
            ['id' => 61, 'personID' => 61],
            ['id' => 62, 'personID' => 62],
            ['id' => 63, 'personID' => 63],
            ['id' => 64, 'personID' => 64],
            ['id' => 65, 'personID' => 65],
            ['id' => 66, 'personID' => 66],
            ['id' => 67, 'personID' => 67],
            ['id' => 68, 'personID' => 68],

        ];
        foreach ($items as $item) {
            Author::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}

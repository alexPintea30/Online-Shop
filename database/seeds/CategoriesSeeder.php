<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'straina'],
            ['id' => 2, 'name' => 'romaneasca'],
        ];

        foreach ($items as $item) {
            Category::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}

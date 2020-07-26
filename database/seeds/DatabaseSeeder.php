<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PeopleSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(SalesSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id'=> 1, 'name'=> 'other'],
            ['id'=> 2, 'name'=> 'RO'],
            ['id'=> 3, 'name'=> 'Alba'],
            ['id'=> 4, 'name'=> 'Arad'],
            ['id'=> 5, 'name'=> 'Arges'],
            ['id'=> 6, 'name'=> 'Bacau'],
            ['id'=> 7, 'name'=> 'Bihor'],
            ['id'=> 8, 'name'=> 'Bistrita-Nasaud'],
            ['id'=> 9, 'name'=> 'Botosani'],
            ['id'=> 10, 'name'=> 'Brasov'],
            ['id'=> 11, 'name'=> 'Braila'],
            ['id'=> 12, 'name'=> 'Buzau'],
            ['id'=> 13, 'name'=> 'Caras-Severin'],
            ['id'=> 14, 'name'=> 'Calarasi'],
            ['id'=> 15, 'name'=> 'Cluj'],
            ['id'=> 16, 'name'=> 'Constanta'],
            ['id'=> 17, 'name'=> 'Covasna'],
            ['id'=> 18, 'name'=> 'Dambovita'],
            ['id'=> 19, 'name'=> 'Dolj'],
            ['id'=> 20, 'name'=> 'Galati'],
            ['id'=> 21, 'name'=> 'Giurgiu'],
            ['id'=> 22, 'name'=> 'Gorj'],
            ['id'=> 23, 'name'=> 'Harghita'],
            ['id'=> 24, 'name'=> 'Hunedoara'],
            ['id'=> 25, 'name'=> 'Ialomita'],
            ['id'=> 26, 'name'=> 'Iasi'],
            ['id'=> 27, 'name'=> 'Ilfov'],
            ['id'=> 28, 'name'=> 'Maramures'],
            ['id'=> 29, 'name'=> 'Mehedinti'],
            ['id'=> 30, 'name'=> 'Mures'],
            ['id'=> 31, 'name'=> 'Neamt'],
            ['id'=> 32, 'name'=> 'Olt'],
            ['id'=> 33, 'name'=> 'Prahova'],
            ['id'=> 34, 'name'=> 'Satu Mare'],
            ['id'=> 35, 'name'=> 'Salaj'],
            ['id'=> 36, 'name'=> 'Sibiu'],
            ['id'=> 37, 'name'=> 'Suceava'],
            ['id'=> 38, 'name'=> 'Teleorman'],
            ['id'=> 39, 'name'=> 'Timis'],
            ['id'=> 40, 'name'=> 'Tulcea'],
            ['id'=> 41, 'name'=> 'Vaslui'],
            ['id'=> 42, 'name'=> 'Valcea'],
            ['id'=> 43, 'name'=> 'Vrancea'],
            ['id'=> 44, 'name'=> 'Bucuresti'],
        ];

        foreach ($items as $item) {
            Region::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}

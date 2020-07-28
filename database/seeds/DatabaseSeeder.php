<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $regions = ['Alba', 'Arad', 'Arges', 'Bacau', 'Bihor', 'Bistrita-Nasaud',
        'Botosani', 'Brasov', 'Braila', 'Bucuresti', 'Buzau', 'Caras-Severin', 'Calarasi',
        'Cluj', 'Constanta', 'Covasna', 'Dambovita', 'Dolj', 'Galati', 'Giurgiu', 'Gorj',
        'Hunedoara', 'Harghita', 'Ialomita', 'Iasi', 'Ilfov', 'Maramures', 'Mehedinti',
        'Mures', 'Neamt', 'Olt', 'Prohova', 'Satu Mare', 'Salaj', 'Sibiu', 'Teleorman',
        'Suceava', 'Timis', 'Tulcea', 'Vaslui', 'Valcea', 'Vrancea'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $files_arr = scandir( dirname(__FILE__) ); //store filenames into $files_array
        foreach ($files_arr as $key => $file){
            if ($file !== 'DatabaseSeeder.php' && $file[0] !== "." ){
                $this->call( explode('.', $file)[0] );
            }
        }
    }
}

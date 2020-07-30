<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'email' => 'alexandra.pop@gmail.com', 'password'=>bcrypt('parola1'),'isAdmin'=> 0,'personID'=> 69],
            ['id' => 2, 'email' => 'mihai.sima@gmail.com', 'password'=> bcrypt('parola2'),'isAdmin'=> 0,'personID'=> 70],
            ['id' => 3, 'email' => 'maria.anton@gmail.com', 'password'=> bcrypt('parola3'),'isAdmin'=> 0,'personID'=> 71],
            ['id' => 4, 'email' => 'adrian.ionescu@gmail.com', 'password'=> bcrypt('parola4'),'isAdmin'=> 0,'personID'=> 72],
            ['id' => 5, 'email' => 'laura.anghel@gmail.com', 'password'=>bcrypt('parola5'),'isAdmin'=> 0,'personID'=> 73],
            ['id' => 6, 'email' => 'ioan.pancu@gmail.com', 'password'=> bcrypt('parola6'),'isAdmin'=> 0,'personID'=> 74],
            ['id' => 7, 'email' => 'bogdan.popescu@gmail.com', 'password'=> bcrypt('parola7'),'isAdmin'=> 0,'personID'=> 75],
            ['id' => 8, 'email' => 'ionela.brandusa@gmail.com', 'password'=> bcrypt('parola8'),'isAdmin'=> 0,'personID'=> 76],
            ['id' => 9, 'email' => 'marian.constantin@gmail.com', 'password'=> bcrypt('parola9'),'isAdmin'=> 0,'personID'=> 77],
            ['id' => 10, 'email' => 'andrada.popa@gmail.com', 'password'=> bcrypt('parola10'),'isAdmin'=> 0,'personID'=> 78],
            ['id' => 11, 'email' => 'crina.bostan@gmail.com', 'password'=> bcrypt('parola11'),'isAdmin'=> 0,'personID'=> 79],
            ['id' => 12, 'email' => 'cosmin.paul@gmail.com', 'password'=> bcrypt('parola12'),'isAdmin'=> 0,'personID'=> 80],
            ['id' => 13, 'email' => 'david.mare@gmail.com', 'password'=> bcrypt('parola13'),'isAdmin'=> 0,'personID'=> 81],
            ['id' => 14, 'email' => 'marian.pop@gmail.com', 'password'=> bcrypt('parola14'),'isAdmin'=> 0,'personID'=> 82],
            ['id' => 15, 'email' => 'antonia.cret@gmail.com', 'password'=> bcrypt('parola15'),'isAdmin'=> 0,'personID'=> 83],
            ['id' => 16, 'email' => 'julia.ciocan@gmail.com', 'password'=> bcrypt('parola16'),'isAdmin'=> 0,'personID'=> 84],
            ['id' => 17, 'email' => 'anca.ciorba@gmail.com', 'password'=> bcrypt('parola17'),'isAdmin'=> 0,'personID'=> 85],
            ['id' => 18, 'email' => 'rares.pintea@gmail.com', 'password'=> bcrypt('parola18'),'isAdmin'=> 0,'personID'=> 86],
            ['id' => 19, 'email' => 'mihai.ghica@gmail.com', 'password'=> bcrypt('parola19'),'isAdmin'=> 0,'personID'=> 88],
            ['id' => 20, 'email' => 'john.doe@gmail.com', 'password'=> bcrypt('parola20'),'isAdmin'=> 1,'personID'=> 89],
            ['id' => 21, 'email' => 'jane.doe@gmail.com', 'password'=>bcrypt('parola21'),'isAdmin'=> 1,'personID'=> 90],

        ];
        foreach ($items as $item) {
            User::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}

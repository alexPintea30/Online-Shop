<?php

use Illuminate\Database\Seeder;
use App\Person;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'nume' => 'Manson', 'prenume'=>'Mark','data_nasterii'=>'1984-03-09','judetID'=> 1],
            ['id' => 2, 'nume' => 'Owens', 'prenume'=>'Delia','data_nasterii'=>'1949-04-04','judetID'=> 1],
            ['id' => 3, 'nume' => 'Kiyosaki', 'prenume'=>'Kiyosaki','data_nasterii'=>'1947-04-08','judetID'=> 1],
            ['id' => 4, 'nume' => 'Boyne', 'prenume'=>'John','data_nasterii'=>'1971-04-30','judetID'=> 1],
            ['id' => 5, 'nume' => 'Voss', 'prenume'=>'Chris','data_nasterii'=>'1988-03-31','judetID'=> 1],
            ['id' => 6, 'nume' => 'Zusak', 'prenume'=>'Markus','data_nasterii'=>'1975-06-23','judetID'=> 1],
            ['id' => 7, 'nume' => 'Michaelides', 'prenume'=>'Alex','data_nasterii'=>'1977-09-04','judetID'=> 1],
            ['id' => 8, 'nume' => 'Goleman', 'prenume'=>'Daniel','data_nasterii'=>'1946-03-07','judetID'=> 1],
            ['id' => 9, 'nume' => 'Obama', 'prenume'=>'Michelle','data_nasterii'=>'1964-01-17','judetID'=> 1],
            ['id' => 10, 'nume' => 'Chapman', 'prenume'=>'Gary','data_nasterii'=>'1938-01-10','judetID'=> 1],
            ['id' => 11, 'nume' => 'Brown', 'prenume'=>'Brene','data_nasterii'=>'1965-11-18','judetID'=> 1],
            ['id' => 12, 'nume' => 'Lugand', 'prenume'=>'Martin','data_nasterii'=>'1979-07-23','judetID'=> 1],
            ['id' => 13, 'nume' => 'Kishimi', 'prenume'=>'Ichiro','data_nasterii'=>'1956-07-23','judetID'=> 1],
            ['id' => 14, 'nume' => 'Carnegie', 'prenume'=>'Dale','data_nasterii'=>'1888-11-24','judetID'=> 1],
            ['id' => 15, 'nume' => 'Maxwell', 'prenume'=>'John','data_nasterii'=>'1947-02-20','judetID'=> 1],
            ['id' => 16, 'nume' => 'Lippincot', 'prenume'=>'Rachael','data_nasterii'=>'1980-07-23','judetID'=> 1],
            ['id' => 17, 'nume' => 'Moyes', 'prenume'=>'Jojo','data_nasterii'=>'1969-08-04','judetID'=> 1],
            ['id' => 18, 'nume' => 'Alcott', 'prenume'=>'Louisa','data_nasterii'=>'1832-11-29','judetID'=> 1],
            ['id' => 19, 'nume' => 'Creanga', 'prenume'=>'Ion','data_nasterii'=>'1837-03-01','judetID'=> 2],
            ['id' => 20, 'nume' => 'Setepys', 'prenume'=>'Ruta','data_nasterii'=>'1967-11-19','judetID'=> 1],
            ['id' => 21, 'nume' => 'Tolle', 'prenume'=>'Eckhart','data_nasterii'=>'1948-02-16','judetID'=> 1],
            ['id' => 22, 'nume' => 'Frankl', 'prenume'=>'Viktor','data_nasterii'=>'1905-03-26','judetID'=> 1],
            ['id' => 23, 'nume' => 'Black', 'prenume'=>'Holly','data_nasterii'=>'1971-11-10','judetID'=> 1],
            ['id' => 24, 'nume' => 'Atwood', 'prenume'=>'Margarete','data_nasterii'=>'1939-11-18','judetID'=> 1],
            ['id' => 25, 'nume' => 'O’Connor', 'prenume'=>'Joseph','data_nasterii'=>'1963-09-20','judetID'=> 1],
            ['id' => 26, 'nume' => 'Hesse', 'prenume'=>'Herman','data_nasterii'=>'1877-07-02','judetID'=> 1],
            ['id' => 27, 'nume' => 'Huxley', 'prenume'=>'Aldous','data_nasterii'=>'1894-07-26','judetID'=> 1],
            ['id' => 28, 'nume' => 'Long', 'prenume'=>'Ruperto','data_nasterii'=>'1952-12-23','judetID'=> 1],
            ['id' => 29, 'nume' => 'De Rijk', 'prenume'=>'Elise','data_nasterii'=>'1995-07-25','judetID'=> 1],
            ['id' => 30, 'nume' => 'Brousse', 'prenume'=>'Myriam','data_nasterii'=>'1950-11-23','judetID'=> 1],
            ['id' => 31, 'nume' => 'Marinescu', 'prenume'=>'Aurelia ','data_nasterii'=>'1934-02-21','judetID'=> 2],
            ['id' => 32, 'nume' => 'Blenche', 'prenume'=>'Alec','data_nasterii'=>'1975-10-10','judetID'=> 1],
            ['id' => 33, 'nume' => 'Russell', 'prenume'=>'Bertrand','data_nasterii'=>'1872-05-18','judetID'=> 1],
            ['id' => 34, 'nume' => 'Watt', 'prenume'=>'Erin','data_nasterii'=>'1990-11-20','judetID'=> 1],
            ['id' => 35, 'nume' => 'Ziglar', 'prenume'=>'Zig','data_nasterii'=>'1926-11-06','judetID'=> 1],
            ['id' => 36, 'nume' => 'Milton', 'prenume'=>'Giles','data_nasterii'=>'1966-01-15','judetID'=> 1],
            ['id' => 37, 'nume' => 'Scovell Shin', 'prenume'=>'Florence','data_nasterii'=>'1871-09-24','judetID'=> 1],
            ['id' => 38, 'nume' => 'Riley', 'prenume'=>'Lucinda','data_nasterii'=>'1966-05-01','judetID'=> 1],
            ['id' => 39, 'nume' => 'Forman', 'prenume'=>'Gayle','data_nasterii'=>'1970-06-05','judetID'=> 1],
            ['id' => 40, 'nume' => 'Hoover', 'prenume'=>'Colleen','data_nasterii'=>'1979-12-11','judetID'=> 1],
            ['id' => 41, 'nume' => 'Lincu', 'prenume'=>'Cristina','data_nasterii'=>'1979-08-22','judetID'=> 2],
            ['id' => 42, 'nume' => 'Partenie', 'prenume'=>'Catalin','data_nasterii'=>'1971-04-15','judetID'=> 2],
            ['id' => 43, 'nume' => 'Stancu', 'prenume'=>'Zaharia','data_nasterii'=>'1902-10-07','judetID'=> 2],
            ['id' => 44, 'nume' => 'Rusti', 'prenume'=>'Doina','data_nasterii'=>'1957-02-15','judetID'=> 2],
            ['id' => 45, 'nume' => 'Liiceanu', 'prenume'=>'Aurora','data_nasterii'=>'1941-08-01','judetID'=> 2],
            ['id' => 46, 'nume' => 'Culianu', 'prenume'=>'Ioan Petru','data_nasterii'=>'1950-01-05','judetID'=> 2],
            ['id' => 47, 'nume' => 'Serghi', 'prenume'=>'Cella','data_nasterii'=>'1907-11-04','judetID'=> 2],
            ['id' => 48, 'nume' => 'Lungu', 'prenume'=>'Simona','data_nasterii'=>'1973-11-11','judetID'=> 2],
            ['id' => 49, 'nume' => 'Tudose', 'prenume'=>'Maria Cristiana','data_nasterii'=>'1989-03-07','judetID'=> 2],
            ['id' => 50, 'nume' => 'Russo', 'prenume'=>'Andreea','data_nasterii'=>'1990-07-22','judetID'=> 2],
            ['id' => 51, 'nume' => 'Binder', 'prenume'=>'Irina','data_nasterii'=>'1982-05-12','judetID'=> 2],
            ['id' => 52, 'nume' => 'Lazar', 'prenume'=>'George','data_nasterii'=>'1963-02-03','judetID'=> 2],
            ['id' => 53, 'nume' => 'Cuceanu', 'prenume'=>'Felix','data_nasterii'=>'1983-02-11','judetID'=> 2],
            ['id' => 54, 'nume' => 'Gulie', 'prenume'=>'Alexandru-Mihai','data_nasterii'=>'1981-09-09','judetID'=> 2],
            ['id' => 55, 'nume' => 'Arama', 'prenume'=>'Ion','data_nasterii'=>'1936-10-18','judetID'=> 2],
            ['id' => 56, 'nume' => 'Adamek', 'prenume'=>'Diana','data_nasterii'=>'1976-10-12','judetID'=> 2],
            ['id' => 57, 'nume' => 'Crudu', 'prenume'=>'Dumitru','data_nasterii'=>'1968-11-10','judetID'=> 2],
            ['id' => 58, 'nume' => 'Giurgiu', 'prenume'=>'Cati','data_nasterii'=>'1965-10-09','judetID'=> 2],
            ['id' => 59, 'nume' => 'Bergler', 'prenume'=>'Igor','data_nasterii'=>'1970-09-21','judetID'=> 2],
            ['id' => 60, 'nume' => 'Daneliuc', 'prenume'=>'Mircea','data_nasterii'=>'1943-04-07','judetID'=> 2],
            ['id' => 61, 'nume' => 'Nemerovschi', 'prenume'=>'Cristina','data_nasterii'=>'1980-05-10','judetID'=> 2],
            ['id' => 62, 'nume' => 'Ardelean', 'prenume'=>'Flavius','data_nasterii'=>'1985-05-05','judetID'=> 2],
            ['id' => 63, 'nume' => 'Duda', 'prenume'=>'Ioana','data_nasterii'=>'1973-09-12','judetID'=> 2],
            ['id' => 64, 'nume' => 'Podoreanu', 'prenume'=>'Cristina','data_nasterii'=>'1967-08-08','judetID'=> 2],
            ['id' => 65, 'nume' => 'Gavrilutiu', 'prenume'=>'Alain','data_nasterii'=>'1976-08-26','judetID'=> 2],
            ['id' => 66, 'nume' => 'Eliade', 'prenume'=>'Mircea','data_nasterii'=>'1907-03-13','judetID'=> 2],
            ['id' => 67, 'nume' => 'Calinescu', 'prenume'=>'George','data_nasterii'=>'1899-06-19','judetID'=> 2],
            ['id' => 68, 'nume' => 'Rebreanu', 'prenume'=>'Liviu','data_nasterii'=>'1885-11-27','judetID'=> 2],
            ['id' => 69, 'nume' => 'Pop', 'prenume'=>'Alexandra','data_nasterii'=>'1976-11-23','judetID'=> 6],
            ['id' => 70, 'nume' => 'Sima', 'prenume'=>'Mihai','data_nasterii'=>'1999-10-20','judetID'=> 13],
            ['id' => 71, 'nume' => 'Anton', 'prenume'=>'Maria','data_nasterii'=>'1993-09-17','judetID'=> 38],
            ['id' => 72, 'nume' => 'Ionescu', 'prenume'=>'Adrian','data_nasterii'=>'1986-06-13','judetID'=> 41],
            ['id' => 73, 'nume' => 'Anghel', 'prenume'=>'Laura','data_nasterii'=>'1987-10-12','judetID'=> 44],
            ['id' => 74, 'nume' => 'Pancu', 'prenume'=>'Ioan','data_nasterii'=>'1964-11-12','judetID'=> 7],
            ['id' => 75, 'nume' => 'Popescu', 'prenume'=>'Bogdan','data_nasterii'=>'1991-02-03','judetID'=> 9],
            ['id' => 76, 'nume' => 'Brandusa', 'prenume'=>'Ionela','data_nasterii'=>'1990-09-09','judetID'=> 10],
            ['id' => 77, 'nume' => 'Constantin', 'prenume'=>'Marian','data_nasterii'=>'1979-12-23','judetID'=> 22],
            ['id' => 78, 'nume' => 'Popa', 'prenume'=>'Andrada','data_nasterii'=>'1982-10-10','judetID'=> 25],
            ['id' => 79, 'nume' => 'Bostan', 'prenume'=>'Crina','data_nasterii'=>'1978-04-04','judetID'=> 33],
            ['id' => 80, 'nume' => 'Paul', 'prenume'=>'Cosmin','data_nasterii'=>'2003-07-11','judetID'=> 34],
            ['id' => 81, 'nume' => 'Mare', 'prenume'=>'David','data_nasterii'=>'2005-05-07','judetID'=> 4],
            ['id' => 82, 'nume' => 'Pop', 'prenume'=>'Marian','data_nasterii'=>'2008-06-06','judetID'=> 44],
            ['id' => 83, 'nume' => 'Cret', 'prenume'=>'Antonia','data_nasterii'=>'2010-07-07','judetID'=> 6],
            ['id' => 84, 'nume' => 'Ciocan', 'prenume'=>'Julia','data_nasterii'=>'2000-09-01','judetID'=> 13],
            ['id' => 85, 'nume' => 'Ciorba', 'prenume'=>'Anca','data_nasterii'=>'1996-08-23','judetID'=> 33],
            ['id' => 86, 'nume' => 'Pintea', 'prenume'=>'Rares','data_nasterii'=>'1995-07-24','judetID'=> 19],
            ['id' => 87, 'nume' => 'Huja', 'prenume'=>'Petre','data_nasterii'=>'1984-04-20','judetID'=> 20],
            ['id' => 88, 'nume' => 'Ghica', 'prenume'=>'Mihai','data_nasterii'=>'1982-11-23','judetID'=> 17],
            ['id' => 89, 'nume' => 'Doe', 'prenume'=>'John','data_nasterii'=>'1989-12-31','judetID'=> 39],
            ['id' => 90, 'nume' => 'Doe', 'prenume'=>'jane','data_nasterii'=>'1990-10-10','judetID'=> 19],

        ];


        foreach ($items as $item) {
            Person::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}

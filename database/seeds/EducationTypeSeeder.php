<?php

use App\Models\EducationType;
use Illuminate\Database\Seeder;

class EducationTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'حكومي',],
            ['name' => 'تجريبي',],
            ['name' => 'خاص',],
            ['name' => 'بريطاني',],
            ['name' => 'أمريكي',],
            ['name' => 'أخري',],
        ];

        EducationType::insert($data);
    }
}

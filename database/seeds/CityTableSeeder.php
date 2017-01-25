<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'country_id' => 1, 'name' => 'أسوان', 'is_enabled' => 1],
            ['id' => 2, 'country_id' => 1, 'name' => 'أسيوط', 'is_enabled' => 1],
            ['id' => 3, 'country_id' => 1, 'name' => 'إسماعيلية', 'is_enabled' => 1],
            ['id' => 4, 'country_id' => 1, 'name' => 'الأقصر', 'is_enabled' => 1],
            ['id' => 5, 'country_id' => 1, 'name' => 'الإسكندرية', 'is_enabled' => 1],
            ['id' => 6, 'country_id' => 1, 'name' => 'البحر الأحمر', 'is_enabled' => 1],
            ['id' => 7, 'country_id' => 1, 'name' => 'البحيرة', 'is_enabled' => 1],
            ['id' => 8, 'country_id' => 1, 'name' => 'الجيزة', 'is_enabled' => 1],
            ['id' => 9, 'country_id' => 1, 'name' => 'الدقهلية', 'is_enabled' => 1],
            ['id' => 10, 'country_id' => 1, 'name' => 'السويس', 'is_enabled' => 1],
            ['id' => 11, 'country_id' => 1, 'name' => 'الشرقية', 'is_enabled' => 1],
            ['id' => 12, 'country_id' => 1, 'name' => 'الغربية', 'is_enabled' => 1],
            ['id' => 13, 'country_id' => 1, 'name' => 'الفيوم', 'is_enabled' => 1],
            ['id' => 14, 'country_id' => 1, 'name' => 'القاهرة', 'is_enabled' => 1],
            ['id' => 15, 'country_id' => 1, 'name' => 'القليوبية', 'is_enabled' => 1],
            ['id' => 16, 'country_id' => 1, 'name' => 'المنوفية', 'is_enabled' => 1],
            ['id' => 17, 'country_id' => 1, 'name' => 'المنيا', 'is_enabled' => 1],
            ['id' => 18, 'country_id' => 1, 'name' => 'الوادي الجديد', 'is_enabled' => 1],
            ['id' => 19, 'country_id' => 1, 'name' => 'بني سويف', 'is_enabled' => 1],
            ['id' => 20, 'country_id' => 1, 'name' => 'بورسعيد', 'is_enabled' => 1],
            ['id' => 21, 'country_id' => 1, 'name' => 'جنوب سيناء', 'is_enabled' => 1],
            ['id' => 22, 'country_id' => 1, 'name' => 'دمياط', 'is_enabled' => 1],
            ['id' => 23, 'country_id' => 1, 'name' => 'سوهاج', 'is_enabled' => 1],
            ['id' => 24, 'country_id' => 1, 'name' => 'شمال سيناء', 'is_enabled' => 1],
            ['id' => 25, 'country_id' => 1, 'name' => 'قنا', 'is_enabled' => 1],
            ['id' => 26, 'country_id' => 1, 'name' => 'كفر الشيخ', 'is_enabled' => 1],
            ['id' => 27, 'country_id' => 1, 'name' => 'مطروح', 'is_enabled' => 1],
        ];

        City::insert($data);
    }
}

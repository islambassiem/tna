<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Fundamental of Excel skills'
        ]);
        Course::create([
            'name' => 'تحليل البيانات باستخدام  SPSS'
        ]);
        Course::create([
            'name' => 'مهارات الاتصال والتواصل الفعال'
        ]);
        Course::create([
            'name' => 'بناء وإدارة فرق العمل'
        ]);
        Course::create([
            'name' => 'دارة الوقت وضغوط العمل'
        ]);
    }
}

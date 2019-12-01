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
        // $this->call(UsersTableSeeder::class);
        DB::table('categorys')->insert([
            [
                'name_category' => 'Sách giáo khoa',
                'describe' => 'Sách dạy học của bộ giáo dục',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name_category' => 'Tiểu thuyết',
                'describe' => 'Tiểu thuyết',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name_category' => 'Truyện tranh',
                'describe' => 'Truyện tranh',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }
}

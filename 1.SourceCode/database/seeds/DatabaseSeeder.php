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
        $this->call(UserPermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(SecCategoryProductTableSeeder::class);
        $this->call(BannerSlideTable::class);
        $this->call(CategoryNewTableSeeder::class);
    }
}

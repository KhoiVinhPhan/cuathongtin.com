<?php

use Illuminate\Database\Seeder;

class BannerSlideTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banner_slide')->insert([
        	['path_to_image'=>'/imageServer/images/Banner/banner01.jpg', 'title'=>'title1', 'information'=>'information1', 'user_id_maked'=>1],
        	['path_to_image'=>'/imageServer/images/Banner/banner01.jpg', 'title'=>'title2', 'information'=>'information2', 'user_id_maked'=>1],
        	['path_to_image'=>'/imageServer/images/Banner/banner01.jpg', 'title'=>'title3', 'information'=>'information3', 'user_id_maked'=>1],
        	['path_to_image'=>'/imageServer/images/Banner/banner01.jpg', 'title'=>'title4', 'information'=>'information4', 'user_id_maked'=>1],
        	['path_to_image'=>'/imageServer/images/Banner/banner01.jpg', 'title'=>'title5', 'information'=>'information5', 'user_id_maked'=>1],
        ]);
    }
}

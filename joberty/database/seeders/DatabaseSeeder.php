<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
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

        Category::truncate();
        User::truncate();
        Advertisement::truncate();

        Advertisement::factory(5)->create();
        /* $user = User::factory()->create();

        $category1 = Category::create([
            'name'=>"IT"
        ]);

        $category2 = Category::create([
            'name'=>"PR"
        ]);

        $category3 = Category::create([
            'name'=>"HR"
        ]);

        $adv1 = Advertisement::create([
            'position'=>'PHP developer',
            'company'=>'Microsoft',
            'description'=>'Junior developer; Full time job',
            'user_id'=>$user->id,
            'category_id'=>$category1->id
        ]);

        $adv2 = Advertisement::create([
            'position'=>'Brand manager',
            'company'=>'Meridian',
            'description'=>'Intenship; Part time',
            'user_id'=>$user->id,
            'category_id'=>$category2->id
        ]);

        $adv3 = Advertisement::create([
            'position'=>'HR specialist',
            'company'=>'Loreal',
            'description'=>'Full time job',
            'user_id'=>$user->id,
            'category_id'=>$category3->id
        ]);
        */

    }
}

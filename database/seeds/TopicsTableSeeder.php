<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $categories_id = Category::pluck('id')->toArray();
        $users_id = User::pluck('id')->toArray();
        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)->times(50)->make()->each(function ($topic, $index) use ($categories_id, $users_id, $faker) {
            $topic->category_id = $faker->randomElement($categories_id);

            $topic->user_id = $faker->randomElement($users_id);
        });

        Topic::insert($topics->toArray());
    }

}


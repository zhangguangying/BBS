<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        $users_id = User::pluck('id')->toArray();
        $topics_id = Topic::pluck('id')->toArray();
        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)->times(100)->make()->each(function ($reply, $index) use ($users_id, $topics_id, $faker) {
            if ($index == 0) {
                // $reply->field = 'value';
            }
            $reply->user_id = $faker->randomElement($users_id);
            $reply->topic_id = $faker->randomElement($topics_id);

        });

        Reply::insert($replys->toArray());
    }

}


<?php

namespace Database\Seeders;

use App\Models\Intro;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = FakerFactory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'image' => $faker->image,
            ];
            foreach (locales() as $key => $value) {
                $data['title'][$key] = $faker->title;
                $data['description'][$key] = $faker->sentence;
            }
            Intro::create($data);
        }
    }
}

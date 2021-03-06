<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WallpaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = ['کامپیوتر', 'موبایل', 'کهکشان', 'آیفون', 'طبیعت'];
        shuffle($tags);
        $tagsNumber = rand(0, 4);
        $tags = json_encode(array_slice($tags, 0, $tagsNumber));
        // $fakeText = $this->faker->words(2, true);
        $size = [400,500, 600, 700];
        // $url = 'https://via.placeholder.com/' . $size[array_rand($size)] . 'x500.png?text=' . $fakeText;
        $url = 'https://picsum.photos/id/' . rand(1, 1050) . '/' . $size[array_rand($size)] . '/' . $size[array_rand($size)];
        return [
            'title' => $this->faker->words(2, true),
            'url' => $url,
            //  'tags' => $tags,
            'user_id' => 1,
            'likes' => rand(0, 5)
        ];
    }
}

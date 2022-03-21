<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Cviebrock\EloquentSluggable\Services\SlugService;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=$this->faker->title();
        $slug = SlugService::createSlug(Post::class, 'slug', $title);
        return [
            "title"=>$title,
            "slug"=>$slug,
            "description"=>$this->faker->text(),
            "user_id"=>User::factory()
        ];
    }
}

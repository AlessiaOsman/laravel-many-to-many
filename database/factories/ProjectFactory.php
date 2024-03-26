<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->text(50);
        $slug = Str::slug($title);
        $type_ids = Type::pluck('id')->toArray();
        $type_ids[] = null;
        Storage::makeDirectory('project_images');
        $img = fake()->image(null,250,250);
        $img_url = Storage::putFileAs('project_images', $img ,"$slug.png");

        return [
            'title'=> $title,
            'content'=>fake()->paragraph(15, true),
            'type_id' => Arr::random($type_ids),
            'url'=>fake()->url(),
            'slug'=>$slug,
            'image'=> $img_url,
        ];
    }
}

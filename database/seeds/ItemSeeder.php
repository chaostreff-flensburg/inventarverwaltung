<?php

use App\Models\Image;
use App\Models\Item;
use App\Models\Itementity;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paths = Storage::disk('public')->allFiles('images');
        Storage::disk('public')->delete($paths);
        
        factory(Item::class, 20)->create()->each(static function (Item $item) {
            $item->entities()->save(factory(Itementity::class)->make());
            $item->image_id = factory(Image::class)->create()->id;
            $item->save();
        });

        $tags = Tag::all();
        Itementity::all()->each(static function (Itementity $entity) use ($tags) {
            $nbTags = random_int(0, 5);
            $entity->tags()->saveMany($tags->random($nbTags));
        });
    }
}

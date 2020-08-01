<?php

use App\Models\Item;
use App\Models\Itementity;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class, 40)->create()->each(static function (Item $item) {
            $item->entities()->save(factory(Itementity::class)->make());
        });

        $tags = Tag::all();
        Itementity::all()->each(static function (Itementity $entity) use ($tags) {
            $nbTags = random_int(0, 5);
            $entity->tags()->saveMany($tags->random($nbTags));
        });
    }
}

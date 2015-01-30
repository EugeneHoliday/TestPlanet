<?php

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			$post = Post::create([
                'title' => $faker->sentence(rand(3,7)),
                'description' => $faker->paragraph(rand(3,14))
            ]);

            foreach(range(1, rand(1,50)) as $index) {
                $like = new Like([
                    'value' => rand(0,1)? 1 : -1,

                ]);
                $post->likes()->save($like);
            }


            foreach(range(1, rand(1,10)) as $index)
            {
                $comment = new Comment([
                    'content' => $faker->paragraph(3),
                    'parent_id' => 0
                ]);
                $post->comments()->save($comment);
                foreach(range(0, rand(1,3)) as $index) {
                    $reply = new Comment([
                        'content' => $faker->paragraph(3),
                        'parent_id' => $comment->id
                    ]);
                    $post->comments()->save($reply);

                }
                foreach(range(1, rand(1,50)) as $index) {
                    $like = new Like([
                        'value' => rand(0,1)? 1 : -1,

                    ]);
                    $comment->likes()->save($like);
                }

            }
		}
	}

}
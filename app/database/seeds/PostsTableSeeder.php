<?php

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

//        DB::table('posts')->delete();
//        $statement = "ALTER TABLE posts AUTO_INCREMENT = 1;";
//        DB::unprepared($statement);

		foreach(range(1, 100) as $index)
		{
			$post = Post::create([
                'title' => $faker->sentence(rand(3,7)),
                'description' => $faker->paragraph(rand(3,14))
            ]);
            foreach(range(1, rand(1,10)) as $index)
            {
                $comment = new Comment([
                    'content' => $faker->paragraph(3)
                ]);
                $post->comments()->save($comment);
                foreach(range(0, rand(1,3)) as $index) {
                    $reply = new Comment([
                        'content' => $faker->paragraph(3)
                    ]);
                    $comment->replies()->save($reply);
                }
            }
		}
	}

}
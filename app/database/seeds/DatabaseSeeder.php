<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        // Truncate all tables, except migrations
        $tables = [
            'posts',
            'comments'
        ];
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        $this->call('PostsTableSeeder');
        // $this->call('CommentsTableSeeder');
	}

}

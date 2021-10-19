<?php

use App\Models\ArticleComment;
use Illuminate\Database\Seeder;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 10; $i++) {
            ArticleComment::create([
                'article_id'    => 1,
                'user_id'    => 2,
                'content' => 'Day la comment so ' .$i,
            ]);
         }
    }
}

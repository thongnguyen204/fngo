<?php

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
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
            if($i>=6)
                Article::create([
                    'title' => 'Day la title '.$i,
                    'thumbnail' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1635424473/FnGO/article/thumbnail/articleThumb_qpziai.png',
                    'background'    => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
                    'user_id' => 1,
                    'abstract' => 'Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi...',
                    'content' => '"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."',
                    'comment_number' => $i,
                ]);
            else
                Article::create([
                    'title' => 'Day la title '.$i,
                    'thumbnail' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1635424473/FnGO/article/thumbnail/articleThumb_qpziai.png',
                    'background'    => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
                    'user_id' => 1,
                    'abstract' => 'Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi...',
                    'content' => '"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."',
                ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Articles;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	for ($i=0; $i < 20; $i++) { 
     		# code...
     		$arr = array(
     			'cate_id'=>rand(1,10),
     			'title'=>'title'.$i,
     			'body'=>'body'.$i,
     		);
     		Articles::create($arr);
     	}
    }
}

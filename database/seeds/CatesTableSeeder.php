<?php

use Illuminate\Database\Seeder;

use App\Cates;
class CatesTableSeeder extends Seeder
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
     		# code...
     		$arr = array(
     			'cate_name'=>'cate'.$i,
     		);
     		Cates::create($arr);
     	}
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('zh_TW');

        Question::truncate();
        //
        foreach(range(1, 1000) as $number) {
        	Question::create([
        		'stages_id' => $faker->randomElement($array = array ('101','102','103','104','105','106','107','108','109','110',
                                                                '201','202','203','204','205','206','207',
                                                                '301','302','303','304','305',
                                                                '401','501','601')),
        		'qtitle' => $number.$faker->text,
        		'ans1_title' => 'ans'.$number,
        		'ans2_title' => 'ans'.$number,
        		'ans3_title' => 'ans'.$number,
        		'ans4_title' => 'ans'.$number,
        		'ans5_title' => 'ans'.$number,
        		'ans6_title' => '放棄',
        		'answer' => rand(1, 5),
        		'detailed' => $faker->text,
        		'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),
        	]);
        }
    }
}

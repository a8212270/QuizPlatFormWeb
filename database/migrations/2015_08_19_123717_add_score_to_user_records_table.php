<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScoreToUserRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_records', function(Blueprint $table)
		{
			$table->integer('stage_score')->insigned();
		});

		Schema::table('users', function(Blueprint $table)
		{
			$table->integer('score')->insigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_records', function(Blueprint $table)
		{
			$table->dropColumn('stage_score');
		});

		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('score');
		});
	}

}

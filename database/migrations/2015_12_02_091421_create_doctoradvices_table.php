<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDoctoradvicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'doctor_advices', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'docid' );
			$table->integer ( 'userid' );
			$table->string ( 'content' );
			$table->integer ('askid');
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('doctor_advices');
	}
}

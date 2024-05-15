<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('user_privileges', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('user_role_id');
			$table->boolean('can_all');
			$table->boolean('can_create_tasks');
			$table->boolean('can_look_all_tasks');
			$table->boolean('can_look_delegate_tasks');
			$table->boolean('can_make_posts');
			$table->boolean('can_order_service');
			$table->boolean('can_responce_by_support');
			$table->boolean('can_ask_question');
			$table->boolean('wallet_access');
			$table->boolean('allow_delegate_access');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('user_privileges');
	}
};

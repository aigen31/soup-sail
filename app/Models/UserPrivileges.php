<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPrivileges extends Model
{
	use HasFactory;

	protected $attributes = [
		'can_all' => false,
    'can_create_company' => false,
		'can_create_tasks' => false,
		'can_look_all_tasks' => false,
		'can_look_delegate_tasks' => false,
		'can_make_posts' => false,
		'can_order_service' => false,
		'can_responce_by_support' => false,
		'can_ask_question' => false,
		'wallet_access' => false,
		'allow_delegate_access' => false,
		'can_delegate_performer' => false,
	];
}

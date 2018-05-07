<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	const USER = 'user';
	const ADMIN = 'admin';

	public function users()
	{
	  return $this->belongsToMany(User::class);
	}
}

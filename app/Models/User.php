<?php

namespace App\Models;

use App\Enums\PermissionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

	protected $appends = ['is_admin', 'name'];
	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'password',
	];
	protected $guard_name = 'api';
	protected $hidden = [
		'password',
		'remember_token',
		'created_at',
		'updated_at',
		'email_verified_at',
	];
	protected $casts = [
		'email_verified_at' => 'datetime',
	];



	//***** MUTATORS
	// getters
	public function getIsAdminAttribute()
	{
		return $this->can(PermissionEnum::PanelAdmin);
	}
	public function getNameAttribute()
	{
		return trim($this->firstname . ' ' . $this->lastname);
	}
	// setters
	public function setFirstnameAttribute($value)
	{
		$this->attributes['firstname'] = ucwords($value);
	}
	public function setLastnameAttribute($value)
	{
		$this->attributes['firstname'] = ucwords($value);
	}
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}
}

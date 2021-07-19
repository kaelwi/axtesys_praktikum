<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{
	protected $casts = ['friends' => 'boolean'];
	public $timestamps = false;
	
	protected $guarded = [];
	/*

	protected $table = 'contacts';
	protected $primaryKey = 'id';
	
	
	
	protected $attributes = [
		'friends' => 0,
		'lastName' => null,
	];
	
	*/
	
	public function getFullName() {
		return "{$this->firstName} {$this->lastName}";
	}
}
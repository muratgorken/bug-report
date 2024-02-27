<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	use HasFactory;

	protected $table = 'author';
	public $timestamps = false;
	protected $fillable = [
		'id',
		'name',
	];

	public function books()
	{
		return $this->hasMany(Books::class, 'author_id');
	}
}

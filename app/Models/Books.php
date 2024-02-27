<?php

namespace App\Models;

use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
	use HasFactory;

	protected $table = 'books';
	public $timestamps = false;
	protected $fillable = [
		'id',
		'name',
		'author_id',
		'type',
		'page_count',
	];

	public function author()
	{
		return $this->belongsTo(Author::class, 'author_id');
	}
}

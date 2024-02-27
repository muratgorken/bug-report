<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

	$books = Author::whereHas('books', function ($query) {
    $query->where('type', 'drama');
		})->withAvg('books as page_count_avg', 'page_count')->toSql();
dump('its wrong:', $books);
    
		echo ' its has to be like this: ';
		 
		dump("SELECT `author`.*,
		(
			SELECT avg(`books`.`page_count`)
			FROM `books`
			WHERE `author`.`id` = `books`.`author_id`
				and `TYPE` = 'drama'
		) AS `page_count_avg`
	FROM `author`
	WHERE EXISTS (
			SELECT *
			FROM `books`
			WHERE `author`.`id` = `books`.`author_id`
				and `TYPE` = 'drama'
		)");





});

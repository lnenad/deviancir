<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Graphic extends Model {

	protected $fillable = [
		'title',
		'user_id',
		'graphic_url',
		'description',
		'tags'
	];

	/**
	 * Get featured artists
	 */

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function comments() {
		return $this->hasMany('App\Comment');
	}
}

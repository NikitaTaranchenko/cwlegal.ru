<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model {

	protected $fillable = ['md5', 'created_at', 'updated_at'];

}

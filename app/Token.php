<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  email
 * @property  hash
 */
class Token extends Model {

	protected $fillable = ['md5', 'created_at', 'updated_at'];

}

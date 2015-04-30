<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class Token extends Model {

    use PresentableTrait;
	protected $fillable = ['hash', 'email', 'created_at', 'updated_at'];
    protected $presenter = 'App\Acme\Presenters\UserPresenter';

}

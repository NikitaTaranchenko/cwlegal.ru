<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller {

	public function index()
    {
        return Carbon::now();
    }

}

<?php
use Illuminate\Database\Seeder;
use App\Token;

/**
 * Created by PhpStorm.
 * User: NikitaTaranchenko
 * Date: 14/02/15
 * Time: 08:01
 */

class TokenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tokens')->delete();

        for ($i=0;$i<10;$i++) {
            Token::create(array('md5' => md5(microtime().$i)));
        }
    }
}
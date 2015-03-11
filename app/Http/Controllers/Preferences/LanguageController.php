<?php namespace App\Http\Controllers\Preferences;

use App\Commands\SwitchLocale;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;


class LanguageController extends Controller {

    public function __construct()
    {

    }


    public function getIndex(Request $request)
    {
        dd($request->getUserInfo());
        dd($request->getHttpHost());
        dd($request->query('selected'));
        dd($request->segment('3'));
        dd($request->url());
        dd($request->segments());
    }
//    public $locales;
//    /**
//     * @var Filesystem
//     */
//    private $filesystem;
//    /**
//     * @var Application
//     */
//    private $app;
//
//    public function __construct(Filesystem $filesystem, Application $app)
//    {
//        $this->filesystem = $filesystem;
//        $this->app = $app;
//    }
//
//    public function changeLang($locale)
//    {
//        $this->dispatch(new SwitchLocale($locale));
//        return redirect()->back();
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getLocales()
//    {
//        $langPath = $this->app->langPath();
//        $langDirs = $this->filesystem->directories($langPath);
//        $this->locales = str_replace($langPath . '/','',$langDirs);
//
//        return $this->locales;
//    }


}

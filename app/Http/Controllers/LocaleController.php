<?php namespace App\Http\Controllers;

use App\Commands\SwitchLocale;
use App\Http\Requests;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Application;

class LocaleController extends Controller {

    public $locales;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Application
     */
    private $app;

    public function __construct(Filesystem $filesystem, Application $app)
    {
        $this->filesystem = $filesystem;
        $this->app = $app;
    }

    public function changeLang($locale)
    {
        $this->dispatch(new SwitchLocale($locale));
        return redirect()->route('show.token.form');
    }

    /**
     * @return mixed
     */
    public function getLocales()
    {
        $langPath = $this->app->langPath();
        $langDirs = $this->filesystem->directories($langPath);
        $this->locales = str_replace($langPath . '/','',$langDirs);

        return $this->locales;
    }


}

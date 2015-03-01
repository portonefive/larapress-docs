<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExamplePageController extends AdminController {

    protected $title = 'Example Page';

    protected $capability = 'administrator';

    /**
     * @return View
     */
    public function render(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            d($request->all());
        }

        return view('admin.example');
    }

    public function test()
    {
        return 'ads';
    }
}

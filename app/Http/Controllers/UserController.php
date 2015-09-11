<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory as ViewFactory;

class UserController extends Controller
{
    /**
     * @var ViewFactory view factory
     */
    protected $view;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    public function login()
    {
        return $this->view->make('user/login');
    }

    public function doLogin(Request $request)
    {
        //login logic
        return back()->withInput($request->except('password'));;
    }

    public function register()
    {

    }

    public function doRegister()
    {

    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public $listuser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->listuser = session()->get('user');
        return view('admin.user.index', ['list' => $this->listuser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $request->all();
        $collection = collect($user);
        session()->push('user', $collection->all());
        return  redirect('/admin/user');
    }

    public function mail()
    {
        $this->user = session()->get('user');
        return view('mails.create', ['list' => $this->listuser]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Services\MailService;
use App\Http\Requests\Admin\SendmailRequest;

class UserController extends Controller
{
    public $listuser;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.user.index', [
            'users' => $this->getSessionUsers(),
        ]);
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
        session::push('users', $request->validated());
        return  view('admin.user.index', [
            'users'=> $this->getSessionUsers(),
    ]);
    }

    public function getMailForm()
    {
        return view('admin.user.sendmail', [
            'users' => $this->getSessionUsers(),
        ]);
    }

    public function sendMail(SendmailRequest $request)
    {
        $targetMail = $request->validated()['mail'];
        $fileAttached = null;
        if ($request->file('fileToUpload')) {
            $fileAttached = $request->file('fileToUpload');
        }

        $users = $this->getSessionUsers();

        if (!strcmp($targetMail, "all")) {
            $users->each(function ($user) use ($fileAttached) {
                $this->mailService->sendUserProfile($user, $fileAttached);
            });

            return redirect()->back();
        }

        $user = $users->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user, $fileAttached);

        return redirect()->back();
    }

    private function getSessionUsers()
    {
        return collect(Session::get('users'));
    }
}

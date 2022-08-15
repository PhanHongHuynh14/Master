<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SendmailRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Services\MailService;
use App\Models\User;
use App\Repositories\Admin\User\UserRepositoryInterface as UserRepository;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $listuser;

    protected $userRepository;

    public function __construct(MailService $mailService, RoleRepository $roleRepository, userRepository $userRepository)
    {
        $this->mailService = $mailService;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => $this->userRepository->with('roles')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form', [
            'roles' => $this->roleRepository->getAll(),
            'isShow' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['verified_at'] = now();
        $data['type'] = User::TYPES['admin'];
        $data['password'] = Hash::make($data['password']);
        DB::begintransaction();

        try {
            $user = $this->userRepository->save($data);
            $user->roles()->sync($request->input('role'));
            DB::commit();

            return redirect()->route('admin.user.index', $user->id)->with(
                'success',
                __('message.success'),
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                __('message.error')
            );
        }
    }

    public function show($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.user.form', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll(),
            'isShow' => true,
        ]);
    }

    public function edit($id)
    {
        if (! $user = $this->userRepository->findById($id)) {
            abort(404);
        }

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll(),
            'isShow' => false,
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        DB::begintransaction();

        try {
            $user = $this->userRepository->save($request->validated(), ['id' => $id]);
            $user->roles()->sync($request->input('role_ids'));
            DB::commit();

            return redirect()->route('admin.user.form', $id)->with(
                'success',
                __('massage.success')
            );
        } catch (Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                __('message.error')
            );
        }
    }

    public function destroy($id)
    {
        DB::begintransaction();

        try {
            $this->userRepository->findById($id)->roles()->detach();
            $this->userRepository->deleteById($id);
            DB::commit();

            return redirect()->route('admin.user.index')->with(
                'succes',
                __('message.deletesuccess')
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                __('mesage.error')
            );
        }
    }


    public function getMailForm()
    {
        return view('admin.user.sendmail', [
            'users' => $this->userRepository->getAll(),
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

        if (! strcmp($targetMail, 'all')) {
            $users->each(function ($user) use ($fileAttached) {
                $this->mailService->sendUserProfile($user, $fileAttached);
            });

            return redirect()->back();
        }

        $user = $users->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user, $fileAttached);

        return redirect()->back();
    }
}

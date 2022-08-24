<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\Customer\CustomerRepositoryInterface as CustomerRepository;
use App\Repositories\Admin\User\UserRepositoryInterface as UserRepository;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\Phonezalo\PhonezaloRepositoryInterface as PhonezaloRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    protected $customerRepository;
    protected $roleRepository;
    protected $userRepository;
    protected $phonezaloRepository;

    public function __construct(CustomerRepository $customerRepository, RoleRepository $roleRepository, UserRepository $userRepository, PhonezaloRepository $phonezaloRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->phonezaloRepository = $phonezaloRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index', [
            'customers' => $this->customerRepository->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.form', [
            'roles' => $this->roleRepository->getAll(),
            'users' => $this->userRepository->getAll(),
            'isShow' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->validated();
        $data ['user_id'] = Auth::user()->id;
        $data['makh'] = 'DG'.$data['cmnd'];

        $customer = $this->customerRepository->save($data);

        foreach ($data['phonezalo'] as $phone) {
            $customer->phone_zalos()->create([
                'phone_zalo' => $phone,
        ]);
        }

        return redirect()->route('admin.customer.index', $customer->id)->with(
            'success',
            'Creation success.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $customer = $this->customerRepository->findById($id)) {
            abort(404);
        }

        return view('admin.customer.form', [
            'customer' => $customer,
            'roles' => $this->roleRepository->getAll(),
            'users' => $this->userRepository->getAll(),
            'phonezalo' => $this->phonezaloRepository->getAll(),
            'isShow' => false,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $customer = $this->customerRepository->save($request->validated(), ['id' => $id]);

            $phones = [];
            foreach ($data['phonezalo'] as $phone_zalo) {
                array_push($phones, ['phone' => $phone_zalo, 'customer_id' => $id]);
            }
            $customer->phonezalo()->delete();
            $customer->phonezalo()->upsert($phones, 'phone');

            DB::commit();

            return redirect()->route('admin.customer.index', $id)->with(
                'success',
                'Edit completed successfully.'
            );
        } catch (Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customerRepository->deleteById($id);

        return redirect()->route('admin.customer.index');
    }
}

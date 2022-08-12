<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionGroupRepository;

    public function __construct(RoleRepository $roleRepository, PermissionGroupRepository $permissionGroupRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index', [
            'roles' => $this->roleRepository->with('permissions')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.form', [
            'permissionGroups' => $this->permissionGroupRepository->with('permissions')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        DB::begintransaction();

        try {
            $role = $this->roleRepository->save($request->validated());
            $role->Permissions()->sync($request->input('permission_ids'));
            DB::commit();

            return redirect()->route('admin.role.index')->with(
                'success',
                'Creation success.'
            );
        } catch (Exception) {
            DB::rollBack();

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! $role = $this->roleRepository->findById($id)) {
            abort(404);
        }

        return view('admin.role.form', [
            'role' => $role,
            'permissionGroups' => $this->permissionGroupRepository->with('permissions')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $role = $this->roleRepository->findById($id)) {
            abort(404);
        }

        return view('admin.role.form', [
            'role' => $role,
            'permissionGroups' => $this->permissionGroupRepository->with('permissions')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        DB::begintransaction();

        try {
            $role = $this->roleRepository->save($request->validated(), ['id' =>  $id]);
            $role->permissions()->sync($request->input('permission_ids'));
            DB::commit();

            return redirect()->route('admin.role.index')->with(
                __('role.success'),
                __('role.editsuccess'),
            );
        } catch (Exception) {
            DB::rollBack();

            return redirect()->back();
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
        DB::begintransaction();

        try {
            $this->roleRepository->findById($id)->Permissions()->detach();
            $this->roleRepository->deleteById($id);
            DB::commit();

            return redirect()->route('admin.role.index')->with(
                __('role.success'),
                __('role.deletionsuccess'),
            );
        } catch (Exception) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}

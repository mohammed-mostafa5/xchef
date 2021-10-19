<?php

namespace App\Http\Controllers\AdminPanel;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AdminPanel\AdminRepository;
use App\Http\Requests\AdminPanel\CreateAdminRequest;
use App\Http\Requests\AdminPanel\UpdateAdminRequest;

class AdminController extends AppBaseController
{
    /** @var  AdminRepository */
    private $adminRepository;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepository = $adminRepo;
    }

    /**
     * Display a listing of the Admin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $admins = $this->adminRepository->paginate(10);

        return view('adminPanel.admins.index')
            ->with('admins', $admins);
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('adminPanel.admins.create',compact('roles'));
    }

    /**
     * Store a newly created Admin in storage.
     *
     * @param CreateAdminRequest $request
     *
     * @return Response
     */
    public function store(CreateAdminRequest $request)
    {
        $input = $request->all();
        $adminable = Administrator::create(['name' => request('name')]);

        $input['adminable_type'] = Administrator::class;
        $input['adminable_id'] = Administrator::class;
        $admin = $adminable->admin()->create($input);

        $admin->syncRoles([request('role')]);

        Flash::success(__('messages.saved', ['model' => __('models/admins.singular')]));

        return redirect(route('adminPanel.admins.index'));
    }

    /**
     * Display the specified Admin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/admins.singular')]));

            return redirect(route('adminPanel.admins.index'));
        }

        return view('adminPanel.admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified Admin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $admin = $this->adminRepository->find($id);
        $roles = Role::pluck('name', 'id');
        if (empty($admin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/admins.singular')]));

            return redirect(route('adminPanel.admins.index'));
        }

        return view('adminPanel.admins.edit', compact('roles', 'admin'));
    }

    /**
     * Update the specified Admin in storage.
     *
     * @param int $id
     * @param UpdateAdminRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdminRequest $request)
    {
        request()->validate([ 'email' => "required|email|max:191|unique:admins,email,$id"]);

        $admin = $this->adminRepository->find($id);

        $admin->syncRoles([request('role')]);

        if (empty($admin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/admins.singular')]));

            return redirect(route('adminPanel.admins.index'));
        }

        $admin = $this->adminRepository->update($request->all(), $id);
        $admin->adminable->update(['name' => request('name')]);

        Flash::success(__('messages.updated', ['model' => __('models/admins.singular')]));

        return redirect(route('adminPanel.admins.index'));
    }

    /**
     * Remove the specified Admin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/admins.singular')]));

            return redirect(route('adminPanel.admins.index'));
        }

        $this->adminRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/admins.singular')]));

        return redirect(route('adminPanel.admins.index'));
    }
}

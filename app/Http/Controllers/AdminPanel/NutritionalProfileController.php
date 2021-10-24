<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateNutritionalProfileRequest;
use App\Http\Requests\AdminPanel\UpdateNutritionalProfileRequest;
use App\Repositories\AdminPanel\NutritionalProfileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NutritionalProfileController extends AppBaseController
{
    /** @var  NutritionalProfileRepository */
    private $nutritionalProfileRepository;

    public function __construct(NutritionalProfileRepository $nutritionalProfileRepo)
    {
        $this->nutritionalProfileRepository = $nutritionalProfileRepo;
    }

    /**
     * Display a listing of the NutritionalProfile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nutritionalProfiles = $this->nutritionalProfileRepository->all();

        return view('adminPanel.nutritional_profiles.index')
            ->with('nutritionalProfiles', $nutritionalProfiles);
    }

    /**
     * Show the form for creating a new NutritionalProfile.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.nutritional_profiles.create');
    }

    /**
     * Store a newly created NutritionalProfile in storage.
     *
     * @param CreateNutritionalProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateNutritionalProfileRequest $request)
    {
        $input = $request->all();

        $nutritionalProfile = $this->nutritionalProfileRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/nutritionalProfiles.singular')]));

        return redirect(route('adminPanel.nutritionalProfiles.index'));
    }

    /**
     * Display the specified NutritionalProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nutritionalProfile = $this->nutritionalProfileRepository->find($id);

        if (empty($nutritionalProfile)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutritionalProfiles.singular')]));

            return redirect(route('adminPanel.nutritionalProfiles.index'));
        }

        return view('adminPanel.nutritional_profiles.show')->with('nutritionalProfile', $nutritionalProfile);
    }

    /**
     * Show the form for editing the specified NutritionalProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nutritionalProfile = $this->nutritionalProfileRepository->find($id);

        if (empty($nutritionalProfile)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutritionalProfiles.singular')]));

            return redirect(route('adminPanel.nutritionalProfiles.index'));
        }

        return view('adminPanel.nutritional_profiles.edit')->with('nutritionalProfile', $nutritionalProfile);
    }

    /**
     * Update the specified NutritionalProfile in storage.
     *
     * @param int $id
     * @param UpdateNutritionalProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNutritionalProfileRequest $request)
    {
        $nutritionalProfile = $this->nutritionalProfileRepository->find($id);

        if (empty($nutritionalProfile)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutritionalProfiles.singular')]));

            return redirect(route('adminPanel.nutritionalProfiles.index'));
        }

        $nutritionalProfile = $this->nutritionalProfileRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/nutritionalProfiles.singular')]));

        return redirect(route('adminPanel.nutritionalProfiles.index'));
    }

    /**
     * Remove the specified NutritionalProfile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nutritionalProfile = $this->nutritionalProfileRepository->find($id);

        if (empty($nutritionalProfile)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutritionalProfiles.singular')]));

            return redirect(route('adminPanel.nutritionalProfiles.index'));
        }

        $this->nutritionalProfileRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/nutritionalProfiles.singular')]));

        return redirect(route('adminPanel.nutritionalProfiles.index'));
    }
}

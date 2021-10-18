<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateMealCreatorRequest;
use App\Http\Requests\AdminPanel\UpdateMealCreatorRequest;
use App\Repositories\AdminPanel\MealCreatorRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\MealCreator;
use Illuminate\Http\Request;
use Flash;
use Response;

class MealCreatorController extends AppBaseController
{
    /** @var  MealCreatorRepository */
    private $mealCreatorRepository;

    public function __construct(MealCreatorRepository $mealCreatorRepo)
    {
        $this->mealCreatorRepository = $mealCreatorRepo;
    }

    /**
     * Display a listing of the MealCreator.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mealCreators = MealCreator::with('admin')->get();

        return view('adminPanel.meal_creators.index')
            ->with('mealCreators', $mealCreators);
    }

    /**
     * Show the form for creating a new MealCreator.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.meal_creators.create');
    }

    /**
     * Store a newly created MealCreator in storage.
     *
     * @param CreateMealCreatorRequest $request
     *
     * @return Response
     */
    public function store(CreateMealCreatorRequest $request)
    {
        // dd($request);
        $input = $request->all();

        $mealCreator = $this->mealCreatorRepository->create($input);
        // dd($mealCreator);
        $mealCreator->admin()->create([
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status,
        ]);

        Flash::success(__('messages.saved', ['model' => __('models/mealCreators.singular')]));

        return redirect(route('adminPanel.mealCreators.index'));
    }

    /**
     * Display the specified MealCreator.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mealCreator = $this->mealCreatorRepository->find($id);

        if (empty($mealCreator)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mealCreators.singular')]));

            return redirect(route('adminPanel.mealCreators.index'));
        }

        return view('adminPanel.meal_creators.show')->with('mealCreator', $mealCreator);
    }

    /**
     * Show the form for editing the specified MealCreator.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mealCreator = $this->mealCreatorRepository->find($id);

        if (empty($mealCreator)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mealCreators.singular')]));

            return redirect(route('adminPanel.mealCreators.index'));
        }

        return view('adminPanel.meal_creators.edit')->with('mealCreator', $mealCreator);
    }

    /**
     * Update the specified MealCreator in storage.
     *
     * @param int $id
     * @param UpdateMealCreatorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMealCreatorRequest $request)
    {
        $mealCreator = $this->mealCreatorRepository->find($id);

        if (empty($mealCreator)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mealCreators.singular')]));

            return redirect(route('adminPanel.mealCreators.index'));
        }

        $mealCreator = $this->mealCreatorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/mealCreators.singular')]));

        return redirect(route('adminPanel.mealCreators.index'));
    }

    /**
     * Remove the specified MealCreator from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mealCreator = $this->mealCreatorRepository->find($id);

        if (empty($mealCreator)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mealCreators.singular')]));

            return redirect(route('adminPanel.mealCreators.index'));
        }

        $this->mealCreatorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/mealCreators.singular')]));

        return redirect(route('adminPanel.mealCreators.index'));
    }
}

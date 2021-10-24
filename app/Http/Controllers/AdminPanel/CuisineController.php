<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCuisineRequest;
use App\Http\Requests\AdminPanel\UpdateCuisineRequest;
use App\Repositories\AdminPanel\CuisineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CuisineController extends AppBaseController
{
    /** @var  CuisineRepository */
    private $cuisineRepository;

    public function __construct(CuisineRepository $cuisineRepo)
    {
        $this->cuisineRepository = $cuisineRepo;
    }

    /**
     * Display a listing of the Cuisine.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cuisines = $this->cuisineRepository->all();

        return view('adminPanel.cuisines.index')
            ->with('cuisines', $cuisines);
    }

    /**
     * Show the form for creating a new Cuisine.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.cuisines.create');
    }

    /**
     * Store a newly created Cuisine in storage.
     *
     * @param CreateCuisineRequest $request
     *
     * @return Response
     */
    public function store(CreateCuisineRequest $request)
    {
        $input = $request->all();

        $cuisine = $this->cuisineRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/cuisines.singular')]));

        return redirect(route('adminPanel.cuisines.index'));
    }

    /**
     * Display the specified Cuisine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuisine = $this->cuisineRepository->find($id);

        if (empty($cuisine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuisines.singular')]));

            return redirect(route('adminPanel.cuisines.index'));
        }

        return view('adminPanel.cuisines.show')->with('cuisine', $cuisine);
    }

    /**
     * Show the form for editing the specified Cuisine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuisine = $this->cuisineRepository->find($id);

        if (empty($cuisine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuisines.singular')]));

            return redirect(route('adminPanel.cuisines.index'));
        }

        return view('adminPanel.cuisines.edit')->with('cuisine', $cuisine);
    }

    /**
     * Update the specified Cuisine in storage.
     *
     * @param int $id
     * @param UpdateCuisineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuisineRequest $request)
    {
        $cuisine = $this->cuisineRepository->find($id);

        if (empty($cuisine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuisines.singular')]));

            return redirect(route('adminPanel.cuisines.index'));
        }

        $cuisine = $this->cuisineRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/cuisines.singular')]));

        return redirect(route('adminPanel.cuisines.index'));
    }

    /**
     * Remove the specified Cuisine from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuisine = $this->cuisineRepository->find($id);

        if (empty($cuisine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuisines.singular')]));

            return redirect(route('adminPanel.cuisines.index'));
        }

        $this->cuisineRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/cuisines.singular')]));

        return redirect(route('adminPanel.cuisines.index'));
    }
}

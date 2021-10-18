<?php

namespace App\Repositories\AdminPanel;

use App\Models\MealCreator;
use App\Repositories\BaseRepository;

/**
 * Class MealCreatorRepository
 * @package App\Repositories\AdminPanel
 * @version October 18, 2021, 9:18 am UTC
*/

class MealCreatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'address',
        'latitude',
        'longitude',
        'photo',
        'delivery_from',
        'delivery_to',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MealCreator::class;
    }
}

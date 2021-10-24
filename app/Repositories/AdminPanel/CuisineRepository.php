<?php

namespace App\Repositories\AdminPanel;

use App\Models\Cuisine;
use App\Repositories\BaseRepository;

/**
 * Class CuisineRepository
 * @package App\Repositories\AdminPanel
 * @version October 24, 2021, 12:36 pm UTC
*/

class CuisineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Cuisine::class;
    }
}

<?php

namespace App\Repositories\AdminPanel;

use App\Models\NutritionalProfile;
use App\Repositories\BaseRepository;

/**
 * Class NutritionalProfileRepository
 * @package App\Repositories\AdminPanel
 * @version October 24, 2021, 11:11 am UTC
*/

class NutritionalProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return NutritionalProfile::class;
    }
}

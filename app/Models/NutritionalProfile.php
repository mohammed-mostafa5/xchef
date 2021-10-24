<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class NutritionalProfile
 * @package App\Models
 * @version October 24, 2021, 11:11 am UTC
 *
 * @property string $name
 * @property integer $status
 */
class NutritionalProfile extends Model
{
    use SoftDeletes, Translatable;


    public $table = 'nutritional_profiles';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'status' => 'integer'
    ];


    public $translatedAttributes = ['name'];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name']  = 'required|string|max:191';
        }

        $rules['status']    = 'required|in:0,1';

        return $rules;
    }



}

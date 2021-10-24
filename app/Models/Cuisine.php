<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Cuisine
 * @package App\Models
 * @version October 24, 2021, 12:36 pm UTC
 *
 * @property string $name
 */
class Cuisine extends Model
{
    use SoftDeletes, Translatable;


    public $table = 'cuisines';


    protected $dates = ['deleted_at'];



    public $fillable = [
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

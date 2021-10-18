<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class MealCreator
 * @package App\Models
 * @version October 18, 2021, 9:18 am UTC
 *
 * @property integer $name
 * @property integer $email
 * @property integer $password
 * @property integer $address
 * @property integer $latitude
 * @property integer $longitude
 * @property integer $photo
 * @property integer $delivery_from
 * @property integer $delivery_to
 * @property integer $status
 */
class MealCreator extends Model
{
    use SoftDeletes, ImageUploaderTrait;


    public $table = 'meal_creators';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'bio',
        // 'email',
        'phone',
        // 'password',
        'address',
        'latitude',
        'longitude',
        'photo',
        'logo',
        'delivery_from',
        'delivery_to',
        // 'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'integer',
        'address' => 'string',
        'latitude' => 'integer',
        'longitude' => 'integer',
        'photo' => 'string',
        'delivery_from' => 'integer',
        'delivery_to' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'name' => 'required|string|min:3|max:191',
        'bio' => 'required|string|min:3',
        'email' => 'required|email',
        'phone' => 'required|numeric|min:3',
        'password' => 'required|string|min:3|confirmed',
        'address' => 'required|string|min:3',
        'latitude' => 'required|string',
        'longitude' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,jpg,png',
        'logo' => 'required|image|mimes:jpeg,jpg,png',
        'delivery_from' => 'required|integer',
        'delivery_to' => 'required|integer',
        'status' => 'required'
    ];

    ################################################################

    protected $appends = [
        'photo_original_path',
        'photo_thumbnail_path',
        'logo_original_path',
        'logo_thumbnail_path',
    ];

    // Photo
    public function setPhotoAttribute($file)
    {
        if ($file) {
            try {
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName, 1200, 450);

                $this->attributes['photo'] = $fileName;
            } catch (\Throwable $th) {
                $this->attributes['photo'] = $file;
            }
        }
    }

    public function getPhotoOriginalPathAttribute()
    {
        return asset('uploads/images/original/' . $this->photo);
    }
    public function getPhotoThumbnailPathAttribute()
    {
        return asset('uploads/images/thumbnail/' . $this->photo);
    }
    // End Photo

    // logo
    public function setLogoAttribute($file)
    {
        if ($file) {
            try {
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName, 1200, 450);

                $this->attributes['logo'] = $fileName;
            } catch (\Throwable $th) {
                $this->attributes['logo'] = $file;
            }
        }
    }

    public function getLogoOriginalPathAttribute()
    {
        return asset('uploads/images/original/' . $this->logo);
    }
    public function getLogoThumbnailPathAttribute()
    {
        return asset('uploads/images/thumbnail/' . $this->logo);
    }
    // End logo


    ################################ Relations ##################################


    public function admin()
    {
        return $this->morphOne(Admin::class, 'adminable');
    }

}

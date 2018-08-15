<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activity
 * @package App\Models
 * @version August 15, 2018, 6:57 pm UTC
 *
 * @property string name
 * @property integer output_id
 * @property string description
 * @property integer status_id
 * @property integer category_id
 * @property integer kebele_id
 * @property string start_date
 * @property string end_date
 * @property string implementing_partners
 * @property integer parent_id
 */
class Activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'output_id',
        'description',
        'status_id',
        'category_id',
        'kebele_id',
        'start_date',
        'end_date',
        'implementing_partners',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'output_id' => 'integer',
        'description' => 'string',
        'status_id' => 'integer',
        'category_id' => 'integer',
        'kebele_id' => 'integer',
        'start_date' => 'string',
        'end_date' => 'string',
        'implementing_partners' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'output_id' => 'required',
        'status_id' => 'required',
        'category_id' => 'required',
        'kebele_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'implementing_partners' => 'required',
        'parent_id' => 'required'
    ];

    
}

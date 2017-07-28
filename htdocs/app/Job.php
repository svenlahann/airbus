<?php

namespace Airbus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job
 * @package Airbus
 */
class Job extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function project()
    {
        return $this->belongsTo('Airbus\Project');
    }

    public function node()
    {
        return $this->belongsTo('Airbus\Node');
    }
}

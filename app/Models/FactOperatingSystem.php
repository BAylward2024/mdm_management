<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class FactOperatingSystem extends Model
{
    // use HasFactory;

    protected $table = 'mdm.fact_operating_system';

    public function version()
    {
        return $this->belongsTo('App\Models\Version');
    }

    public function distribution()
    {
        return $this->belongsTo('App\Models\Distribution');
    }

    public function edition()
    {
        return $this->belongsTo('App\Models\Edition');
    }

    public function getAll()
    {
        return $this->with(['version', 'edition', 'distribution'])->get();
    }
}

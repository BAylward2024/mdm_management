<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class FactPartner extends Model
{
    use HasFactory;

    protected $table = 'mdm.fact_partner';

    public function dimPartner()
    {
        return $this->belongsTo(DimPartner::class, 'partner_id', 'id');
    }

    public function getDimPartner()
    {
        return $this->with(['dimPartner'])->get();
    }

    public function getDimPartnerById($id)
    {
        return $this->with(['dimPartner'])->where('id', '=', $id)->get();
    }
}

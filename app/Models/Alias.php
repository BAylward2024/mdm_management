<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alias extends Model
{
    use HasFactory;

    protected $table = 'mdm.alias';
    protected $factOs = 'mdm.fact_operating_system';
    protected $factPartner = 'mdm.fact_partner';
    protected $dimDistribution = 'mdm.dim_distribution';
    protected $dimEdition = 'mdm.dim_edition';
    protected $dimVersion = 'mdm.dim_version';
    protected $dimFamily = 'mdm.dim_family';
    protected $dimPartner = 'mdm.dim_partner';

    /**
     * Business Requirements:
     * All inserts to be handled through ETL?
     * Deletions to be handled through ETL? Or creation of method??
     */



    //For all base Aliases use Eloquent query:
    //Alias::all(); || Alias::get();

    /**
     * Get all Alias with Operating System Fact/Dimension information
     */
    public function getOSFact()
    {
        return DB::table($this->table)
            ->join($this->factOs, $this->table . '.fact_id', '=', $this->factOs . '.os_id')
            ->join($this->dimDistribution, $this->factOs . '.distribution_id', '=', $this->dimDistribution . '.id')
            ->join($this->dimEdition, $this->factOs . '.edition_id', '=', $this->dimEdition . '.id')
            ->join($this->dimVersion, $this->factOs . '.version_id', '=', $this->dimVersion . '.id')
            ->join($this->dimFamily, $this->factOs . '.family_id', '=', $this->dimFamily . '.id')
            ->where('fact_table', '=', 'fact_operating_system')
            ->orderBy('alias', 'asc')
            ->get();
    }

    /**
     * Get all Alias with Partner Fact/Dimension information
     */
    public function getPartnerFact()
    {
        return DB::table($this->table)
            ->join($this->factPartner, $this->table . '.fact_id', '=', $this->factPartner . '.id')
            ->join($this->dimPartner, $this->factPartner . '.partner_id', '=', $this->dimPartner . '.id')
            ->where('fact_table', '=', 'fact_partner')
            ->orderBy('alias', 'asc')
            ->get();
    }

    /**
     * Get all unassigned Aliases
     */
    public function getUnassigned()
    {
        return DB::table($this->table)
            ->whereNull('fact_id')
            ->orderBy('alias', 'asc')
            ->get();
    }

    /**
     * Update Alias with fact & fact table.
     * Returns 0 for failure. 1 for success.
     */
    public function updateAlias($id, $factTable, $factId)
    {
        return DB::table($this->table)
            ->where('id', '=', $id)
            ->update(['fact_table', '=', $factTable], ['fact_id', '=', $factId]);
    }
}

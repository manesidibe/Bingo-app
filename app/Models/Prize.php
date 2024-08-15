<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $fillable = ['name', 'type', 'campaign_id', 'archived']; // Incluez 'archived'

    // Relation avec le modèle Campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}

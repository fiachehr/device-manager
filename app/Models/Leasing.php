<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device;

class Leasing extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * Get devices by relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function devices()
    {
        return $this->belongsToMany(Device::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Leasing;

/**
 * Class Device
 * @package App\Requests
 *
 * @property string $id
 * @property integer $owner_id
 * @property string $activationCode
 * @property string $deviceAPIKey
 * @property integer $deviceAPIKey
 * @property string $deviceType
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Leasing $leasings[]
 */

class Device extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'owner_id',
        'activationCode',
        'deviceAPIKey',
        'deviceTraining',
        'deviceType',
        'created_at',
        'updated_at',
    ];

    /**
     * Get user by relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    /**
     * Get devices by relation.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function leasings()
    {
        return $this->belongsToMany(Leasing::class);
    }
}

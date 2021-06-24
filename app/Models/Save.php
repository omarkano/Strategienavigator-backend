<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Save
 *
 * @property int $id
 * @property string|null $last_opened
 * @property mixed|null $data
 * @property int $tool_id
 * @property int $owner_id
 * @property int|null $locked_by_id
 * @property string|null $last_locked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Save newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Save newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Save query()
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereLastLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereLastOpened($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereLockedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereToolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Save whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Save extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_opened',
        'last_locked',
        'locked_by_id',
        'data',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_locked' => 'datetime',
        'last_opened' => 'datetime',
    ];


    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function locker(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'locked_by_id');
    }

    public function tool(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tool::class);
    }

    public function invited(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'invite')->using(Invite::class)->as("invitation")->withPivot(["permission"])->withTimestamps();
    }

    public function invitations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Invite::class);
    }

    public function contributors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shared_safe')->using(SharedSave::class)->withPivot(["permission"])->withTimestamps();
    }

    public function invitationLinks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InvitationLink::class);
    }
}

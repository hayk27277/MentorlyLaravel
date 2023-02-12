<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * @property Carbon   $created_at
 * @property string   $first_name
 * @property string   $last_name
 * @property string   $education
 * @property string   $email
 * @property Major    $major
 * @property UserRole $role
 * @property string   $about
 * @property string   $aims_description
 */
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_role_id',
        'major_id',
        'education',
        'experience',
        'aims_description',
        'about',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): HasOne
    {
        return $this->hasOne(UserRole::class, 'id', 'user_role_id');
    }

    public function major(): HasOne
    {
        return $this->hasOne(Major::class, 'id', 'major_id');
    }

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function search(string $q): Builder
    {
        return $this->query()->where(function ($query) use ($q): void {
            $query->where('first_name', 'LIKE', "%$q%")
                ->orWhere('last_name', 'LIKE', "%$q%");
        });
    }
}

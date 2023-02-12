<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $name,
 * @property int    $id,
 */
class UserRole extends Model
{
    use HasFactory;

    public $timestamps = false;
}

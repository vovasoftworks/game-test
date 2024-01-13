<?php

namespace App\Models;

use App\Services\Dto\GameDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\
 *
 * @property string $id;
 * @property string $email;
 */
class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}

<?php

namespace App\Models;

use App\Services\Dto\GameDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Result
 *
 * @property string $id
 * @property string $member_id
 * @property string $milliseconds
 */
class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'milliseconds',
    ];

    public static function staticCreate(GameDto $dto, $member = null): Result
    {
        $result = new self();
        $result->setMemberId($member ? $member->id : null);
        $result->setMilliseconds($dto->milliseconds);

        return $result;
    }

    public function setMilliseconds(int $milliseconds): void
    {
        $this->milliseconds = $milliseconds;
    }

    public function setMemberId($memberId): void
    {
        $this->member_id = $memberId;
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}

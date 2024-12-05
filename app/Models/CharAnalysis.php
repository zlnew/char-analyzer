<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharAnalysis
 *
 * @method static Builder<static>|CharAnalysis newModelQuery()
 * @method static Builder<static>|CharAnalysis newQuery()
 * @method static Builder<static>|CharAnalysis query()
 * @method static Builder<static>|CharAnalysis whereId($value)
 * @method static Builder<static>|CharAnalysis whereIsCharOne($value)
 * @method static Builder<static>|CharAnalysis whereIsCharTwo($value)
 * @method static Builder<static>|CharAnalysis whereIsPercentage($value)
 * @method static Builder<static>|CharAnalysis whereCreatedAt($value)
 * @method static Builder<static>|CharAnalysis whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 *
 * @property int $id
 * @property string $char_one
 * @property string $char_two
 * @property float $percentage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class CharAnalysis extends Model
{
    use HasFactory;

    protected $table = 'char_analyses';

    protected $fillable = [
        'char_one',
        'char_two',
        'percentage',
    ];

    public function calculateCharMatch(int $matches, int $total)
    {
        $percentage = $total > 0 ? ($matches / $total) * 100 : 0;

        return round($percentage);
    }
}

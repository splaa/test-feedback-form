<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public const STATUS_VIEWED = 'viewed';
    public const STATUS_UNSEEN = 'unseen';

    /**
     * Атрибуты, которые можно назначать массово.
     *
     * @var array
     */
    protected $fillable = [
    'title', 'user_id', 'message', 'status', 'file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

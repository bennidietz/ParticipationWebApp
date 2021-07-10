<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'suggestion_id',
        'comment_id',
        'asset_id'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }
}

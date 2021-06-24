<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
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

    ];

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}

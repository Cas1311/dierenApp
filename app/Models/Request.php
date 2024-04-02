<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'listing_id',
        'accepted',
    ];

    /**
     * Get the user that made the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the listing that the request is for.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}

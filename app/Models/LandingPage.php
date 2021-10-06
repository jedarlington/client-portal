<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the client that owns the landing page.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

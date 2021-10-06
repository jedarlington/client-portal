<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the landing pages for the client.
     */
    public function landingPages()
    {
        return $this->hasMany(LandingPage::class);
    }
}

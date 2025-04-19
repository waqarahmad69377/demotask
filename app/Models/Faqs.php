<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    //
    protected $fillable = [
        'question',
        'answer',
    ];

    public function page()
    {
        return $this->belongsToMany(Page::class);
    }
}

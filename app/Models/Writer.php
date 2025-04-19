<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'writer_no',
        'about',
        'eduation',
        'profession',
        'status',
        'experience',
        'rating',
        'no_of_review',
        'order',
        'scucess_rate',
        'on_time_rate',
        'competences',
        'works',
        'online_status',
        'delivery_time',
        'subjects',
        'reviews',
        'image'
    ];

    protected $table = 'writers';
    protected $primaryKey = 'id';

    public function page()
    {
        return $this->belongsToMany(Page::class);
    }
}

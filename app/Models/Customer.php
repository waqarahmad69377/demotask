<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'cust_no',
        'name',
        'review',
        'comment',
        'about',
        'rating',
        'no_of_reviews',
        'date',
        'image'
    ];
    protected $table = 'customers';
    protected $primaryKey = 'id';

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}

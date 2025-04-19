<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'writer_title',
        'writer_content',
        'writer_name',
        'faq_title',
        'faq_content',
        'faq_name',
        'customer_title',
        'customer_content',
        'customer_name',
        'status'
    ];

    public function writers()
    {
        return $this->hasMany(Writer::class, 'page_id');
    }
    public function faqs()
    {
        return $this->hasMany(Faqs::class, 'page_id');
    }
    public function customers()
    {
        return $this->hasMany(Customer::class, 'page_id');
    }
}

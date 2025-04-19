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
        'faq_title',
        'faq_content',
        'customer_title',
        'customer_content',
        'status'
    ];

    public function writers()
    {
        return $this->belongsToMany(Writer::class, 'page_writer', 'page_id', 'writer_id');
    }
    public function faqs()
    {
        return $this->belongsToMany(Faqs::class, 'page_faq', 'page_id', 'faq_id');
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'page_customer', 'page_id', 'customer_id');
    }
}

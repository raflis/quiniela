<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageField extends Model
{
    use HasFactory;

    protected $table = 'page_fields';

    protected $casts = [
        'home_items' => 'array',
        'aboutus_images' => 'array',
        'workshops_images' => 'array',
    ];

    protected $fillable = [
        'home_title', 'home_text', 'home_image', 'home_description', 
        'home_items', 'aboutus_title1', 'aboutus_title2',
        'aboutus_background', 'aboutus_title3', 'aboutus_text',
        'aboutus_images','history_title', 'history_text', 'aboutus_mission', 'aboutus_vision',
        'events_title1', 'events_title2', 'events_image', 'workshops_title1',
        'workshops_title2', 'workshops_image', 'workshops_text', 'workshops_images',
        'blog_title1', 'blog_title2', 'blog_image', 'blog_text', 
        'contact_title1', 'contact_title2', 'contact_image', 'contact_map', 
        'contact_telephone', 'contact_email', 'contact_address', 'contact_schedule1', 'contact_schedule1_time',
        'contact_schedule2', 'contact_schedule2_time', 'facebook', 'instagram', 'twitter', 
        'whatsapp', 'youtube', 'script', 'subscription_price',
    ];
}

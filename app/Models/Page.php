<?php

namespace App\Models;

//use App\Notifications\PageEventNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    //protected static function boot()
    //{
    //    parent::boot();
    //
    //    static::created(function ($page) {
    //        $page->notify(new PageEventNotification('A new page has been created!'));
    //    });
    //}
}

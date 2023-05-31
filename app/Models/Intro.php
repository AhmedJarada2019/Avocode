<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Intro extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $guarded = [];
    public $translatable = ['title', 'description'];
    protected $hidden = ['title', 'description'];
    protected $appends = ['title_translate', 'description_translate'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    public function getTitleTranslateAttribute()
    {
        return @$this->title;
    }

    public function getDescriptionTranslateAttribute()
    {
        return @$this->description;
    }
    public function getImageAttribute($value)
    {
        return !is_null($value) ? Storage::url($value) : '';
    }
}

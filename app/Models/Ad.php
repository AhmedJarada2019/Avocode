<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Spatie\Translatable\HasTranslations;

class Ad extends Model
{
    use HasFactory, HasTranslations;
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $guarded = [];
    public $translatable = ['image'];
    protected $hidden = ['image'];
    protected $appends = ['image_translate'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    // Relations





    // End Relation

    public function getImageTranslateAttribute()
    {
        return !is_null(@$this->image) ? Storage::url(@$this->image) : '';
    }
}

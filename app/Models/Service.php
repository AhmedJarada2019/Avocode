<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $guarded = [];
    public $translatable = ['name'];
    protected $hidden = ['name'];
    protected $appends = ['name_translate'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    // Relations




    // End Relation

    public function getNameTranslateAttribute()
    {
        return @$this->name;
    }

    public function getImageAttribute($value)
    {
        return !is_null($value) ? asset(Storage::url($value)) : '';
    }
}

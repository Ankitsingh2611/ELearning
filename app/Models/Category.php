<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\FeaturedCategory;
use App\Models\Course;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table  = 'categories';

    protected $fillable = [
        'title',
        'description',
        'image',
        'meta_title',
        'meta_description',
    ];
        public function featured_categories()
        {
            return $this->hasMany(FeaturedCategory::class, 'category_id','id');
        }

        public function courses(){
            return  $this->hasMany(Course::class, 'category_id',  'id');
        }
    }


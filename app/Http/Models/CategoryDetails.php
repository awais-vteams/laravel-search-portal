<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*use Laravel\Scout\Searchable;*/

class CategoryDetails extends Model
{
    use SoftDeletes/*, Searchable*/
        ;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'lat', 'lng'
    ];

    static $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:4048'
    ];

    /**
     * Full text search.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $q
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeQuery($query, $q)
    {
        $filter_var = filter_var(preg_replace("/[\"'%()@$.!&?_: #\/-]/", "", $q), FILTER_SANITIZE_STRING);
        return $query->whereRaw("MATCH(name,description) AGAINST(? IN BOOLEAN MODE)", [$filter_var . '*'])
            ->orWhereHas('tags', function ($subquery) use ($filter_var) {
                $subquery->whereRaw("MATCH(name) AGAINST(? IN BOOLEAN MODE)", [$filter_var . '*']);
            })
            ->orWhereHas('userCategory.category', function ($subquery) use ($filter_var) {
                $subquery->where('name', 'like', '%'.$filter_var.'%');
            });
    }

    /**
     * Get the indexable data array for the model.
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return array('id' => $array['id'], 'name' => $array['name'], 'description' => $array['description']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Images', 'category_detail_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function userCategory()
    {
        return $this->hasOne('App\Models\UserCategories', 'category_detail_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tags', 'tagables');
    }
}

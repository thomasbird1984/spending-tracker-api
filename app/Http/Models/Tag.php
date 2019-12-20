<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    protected $fillable = [
        'user_id', 'parent_id', 'title', 'slug', 'description'
    ];

    public function taggable() {
        return $this->morphTo();
    }

    public function budgets() {
        return $this->morphedByMany('App\Http\Models\Budget', 'taggable');
    }

    public function transactions() {
        return $this->hasManyThrough('App\Http\Models\Transaction', 'App\Http\Models\Taggable');
    }
}
<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $fillable = [
        'user_id', 'recurring_id', 'title', 'description', 'amount', 'type', 'status', 'queued', 'occurred_at'
    ];

    public function recurring() {
        return $this->belongsTo('App\Http\Models\Recurring', 'recurring_id');
    }

    public function tags() {
        return $this->morphToMany(
            'App\Http\Models\Tag',
            'taggable'
        );
    }
}
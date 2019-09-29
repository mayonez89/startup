<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestTags extends Model
{
    protected $fillable = [
        "name",
        "interest_id",
    ];

    protected $table = 'interest_tags';
}

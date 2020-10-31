<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use \Spatie\Tags\HasTags;
    use Translatable;
    protected $translatable = ['title', 'body'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    protected $appends = ['embed_link'];

    /**
     * Mutator Attribute Embed Link
     *
     * @return string
     */
    public function getEmbedLinkAttribute()
    {
        return "https://www.youtube.com/embed/{$this->embed_id}";
    }
}

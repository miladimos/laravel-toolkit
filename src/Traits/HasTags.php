<?php

namespace Miladimos\Toolkit\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTags
{
    public function tags()
    {
        return $this->tagsRelation();
    }

    public function tagsRelation(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable', 'taggables');
    }

    public function syncTags(array $tags)
    {
        $this->tagsRelation()->sync($tags);
    }

    public function removeTags(array $tags)
    {
        $this->tagsRelation()->detach($tags);
    }

    public function tagCount(): int
    {
        return $this->tags()->count();
    }
}

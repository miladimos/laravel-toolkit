<?php

namespace Miladimos\Toolkit\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComment
{
    public function comments()
    {
        return $this->commentsRelation;
    }

    public function commentsRelation(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable', 'commentables')->withTimestamps();
    }

    public function syncComments(array $comments)
    {
        $this->commentsRelation()->sync($comments);
        $this->save();
    }

    public function removeComments()
    {
        $this->commentsRelation()->detach();
    }
}

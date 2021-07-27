<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;

trait HasAuthor
{
    public function author(): User
    {
        return $this->authorRelation;
    }

    public function authorRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function authoredBy(User $author)
    {
        $this->authorRelation()->associate($author);
    }

    public function isAuthoredBy(User $user): bool
    {
        return $this->author()->matches($user);
    }
}

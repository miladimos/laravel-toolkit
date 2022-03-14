<?php

namespace Miladimos\Toolkit\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
    public function author()
    {
        return $this->authorRelation();
    }

    public function authorRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function authoredBy(User $author)
    {
        $this->authorRelation()->associate($author);
    }

    public function isAuthoredBy(User $author): bool
    {
        return $this->author()->matches($author);
    }
}

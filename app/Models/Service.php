<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'is_published' => 'bool',
        ];
    }


    //relationshipsss

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Model methods---
    public function canBeManagedBy(?User $user)
    {
        if (!$user) {
            return false;
        }

        if ($user->id === $this->author_id) {
            return true;
        }

        if ($user->is_admin) {
            return true;
        }
        return false;
    }
}

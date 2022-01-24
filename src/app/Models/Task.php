<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // relation
    public function belongsFolder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
    // relation
}
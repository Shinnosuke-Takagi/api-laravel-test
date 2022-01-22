<?php

namespace App\Http\Controllers;

use App\Http\Resources\FolderCollection;
use App\Http\Resources\FolderResource;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        return FolderResource::collection(Folder::all());
    }

    public function show(Folder $folder)
    {
        return new FolderResource($folder);
    }

    public function foldersByUserId(User $author)
    {
        return new FolderCollection($author->folders);
    }
}

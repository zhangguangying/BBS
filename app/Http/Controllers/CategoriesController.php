<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use App\Models\Link;

class CategoriesController extends Controller
{
    //
    public function show(Category $category, Request $request, User $user, Link $link)
    {
        $topics = Topic::where('category_id', $category->id)->withOrder($request->order)->paginate(20);

        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();

        return view('topics.index', compact('topics', 'category', 'active_users'));
    }
}

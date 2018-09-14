<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    //
    public function show(Category $category, Request $request)
    {
        $topics = Topic::where('category_id', $category->id)->withOrder($request->order)->paginate(20);

        return view('topics.index', compact('topics', 'category'));
    }
}

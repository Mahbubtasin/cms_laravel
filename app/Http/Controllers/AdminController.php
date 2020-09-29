<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $categoryCount = Category::count();
        $commentsCount = Comment::count();

        return view('admin.index', compact('usersCount', 'postsCount', 'categoryCount', 'commentsCount'));
    }
}

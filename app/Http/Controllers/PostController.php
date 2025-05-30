<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // Fetch all posts and pass them to the dashboard view
    // You can also use pagination if needed, e.g., Post::paginate(10)
    // For now, we will just return all posts
    // This is a simple example, you might want to add more logic here
    $categories = Category::get();
    $post = Post::orderBy("created_at", "DESC")->get();
    dump($post);
    return view('dashboard', [
      'categories' => $categories,
      'posts' => $post,
      'title' => 'Dashboard',
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    //
  }
}

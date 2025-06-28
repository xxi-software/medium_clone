<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
    $post = Post::orderBy("created_at", "DESC")->simplePaginate(5);
    return view('post.index', [
      'posts' => $post,
      'title' => 'Dashboard',
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::get();
    return view("post.create", [
      "categories" => $categories
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PostCreateRequest $request)
  {
    $validated = $request->validate();

    $image = $validated["image"];
    unset($validated["image"]);
    $validated["user_id"] = Auth::id();
    $validated["slug"] = Str::slug($validated["title"]);

    $imagePath = $image->store("posts", "public");
    $validated["image"] = $imagePath;


    // Guardar en la base de datos (ejemplo con modelo Post)
    $post = Post::create($validated);

    return redirect()->route('dashboard');
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

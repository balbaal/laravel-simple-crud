<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;

class PostController extends Controller
{
	public function index(){
		// $posts = Post::all()->sortByDesc('id');
		// return view('post/index', compact('posts'));

		$posts = DB::table('categories')
					->join('posts', 'posts.category_id', '=', 'categories.id')
					->select('posts.*', 'categories.name')
					->orderBy('id', 'desc')
					->get();

					return view('post/index', compact('posts'));
	}

	public function create(){
		$categories = Category::all();
		return view('post/create', compact('categories'));
	}

	public function store(){
		Post::create([
			$title = request('title'),
			$slug = str_slug($title, '-'),

			'title' => request('title'),
			'category_id' => request('category'),
			'content' => request('content'),
			'slug' => $slug
		]);

		return redirect(route('post.index'));
	}

	public function edit($id){
		$post = Post::find($id);
		$categories = Category::all();

		return view('post.edit', compact('post', 'categories'));
	}

	public function update($id){
		$post = Post::find($id);
		$post->update([
			'title' => request('title'),
			'content' =>request('content'),
			'category_id' =>request('category')
		]);

		return redirect(route('post.index'));
	}

	public function destroy($id){
		$post = Post::find($id);
		$post->delete();

		return redirect(route('post.index'));
	}

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Game;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('game', 'user')->latest();

        // ゲーム選択検索
        if ($request->filled('game_id')) {
            $query->where('game_id', $request->game_id);
        }

        // キーワード検索（投稿本文）
        if ($request->filled('keyword')) {
            $keyword = trim($request->keyword);

            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                ->orWhere('body', 'like', "%{$keyword}%");
            });

            // game名 or alias に一致するゲームID取得
            $gameIds = \App\Models\Game::where('name', 'like', "%{$keyword}%")
                ->orWhere('aliases', 'like', "%{$keyword}%")
                ->pluck('id');

            if ($gameIds->isNotEmpty()) {
                $query->orWhereIn('game_id', $gameIds);
            }
        }

        $posts = $query->get();
        $games = Game::all();

        return view('posts.index', compact('posts', 'games'));
    }

    public function create()
    {
        $games = Game::all();
        return view('posts.create', compact('games'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'game_id' => 'required|exists:games,id',
            'title' => 'required|max:255',
            'body' => 'required',
            'platform' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'game_id' => $request->game_id,
            'title' => $request->title,
            'body' => $request->body,
            'platform' => $request->platform,
            'vc_flag' => $request->has('vc_flag'),
            'beginner_flag' => $request->has('beginner_flag'),
            'play_time' => $request->play_time,
            'recruit_count' => $request->recruit_count,
        ]);

        return redirect()->route('posts.index');
    }
    public function show(Post $post)
    {
        $post->load('game', 'user', 'comments.user');

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $games = Game::all();

        return view('posts.edit', compact('post', 'games'));
    }

    public function update(Request $request, Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'game_id' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $post->delete();

        return redirect()->route('posts.index');
    }
    public function myPosts()
    {
        $posts = Post::with('game')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('posts.my', compact('posts'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('index', compact('posts'));
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }


    public function loginForm()
    {
        if (session('logged_in')) {
            return redirect()->route('posts.index');
        }
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (
            $request->username === env('BLOG_USERNAME') &&
            $request->password === env('BLOG_PASSWORD')
        ) {
            session(['logged_in' => true, 'username' => $request->username]);
            return redirect()->route('posts.index')->with('success', 'Başarıyla giriş yapıldı!');
        }

        return back()->withErrors(['hatali_giris' => 'Kullanıcı adı veya şifre hatalı!']);
    }


    public function logout()
    {
        session()->forget(['logged_in', 'username']);
        return redirect()->route('posts.index')->with('success', 'Çıkış yapıldı.');
    }


    public function create()
    {
        if (!session('logged_in')) {
            return redirect()->route('login')->withErrors(['hatali_giris' => 'Makale eklemek için giriş yapmalısınız!']);
        }
        return view('create');
    }


    public function store(Request $request)
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Makale başarıyla yayınlandı!');
    }
}

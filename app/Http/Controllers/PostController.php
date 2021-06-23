<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    public function index()
    {
        $posts=Post::paginate(5);
        return view('posts.index', compact('posts'));
    }
	
    public function __contstruc()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function show($id)
    {
        $resultado = Post::find($id);
        return view('posts.postUnico', ['post' => $resultado]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required:max:2200',
        ]);

        $imageName= $request->file('image')->store(
            'posts/' . Auth::id(),
        );
        $title = $request->get('title');
        $content = $request->get('content');

        $post = $request->user()->posts()->create([
            'title' => $title,
            'image' => $imageName,
            'content' => $content,
        ]);

        return redirect()->route('post', ['id' => $post->id]);
    }

    public function userPosts()
    {
        $user_id = Auth::id();
        $posts = Post::where('user_id', '=', $user_id)->get();
        return view('posts.index', compact('posts'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required:max:2200',
        ]);

        
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $title = $request->get('title');
        $content = $request->get('content');

        $post = new Post();
        $post->title = $title;
        $post->image = 'img/' . $imageName;
        $post->content = $content;
        $post->save();

        $request->image->move(public_path('img'), $imageName);

        return redirect ()->route('post',['id' => $post->id]);
    }

   
    public function today()
    {
        $posts=Post::all();
        $posts=Post::whereDate('registered_at', '2021-05-26')->get();
        return view('today',compact('posts'));
   
    }
    public function mostrarusuario()
    {
        $resultado = Post::find($id);
        return view('posts.postUnico', ['post' => $resultado]);
    }
    public function delete($id){
        $user = User::find($id);
        $user-> delete();
        flash::danger('el usuario' . $user->name , 'a sido borrado de forma exitosa ! ');
    }
    public function notificaciones (Request $request){
        $user = $request->user();
        $notificaciones = $user->unreadNotifications;
        return view('posts.notificaciones', ['notificaciones'=> $notificaciones]);
    }
}

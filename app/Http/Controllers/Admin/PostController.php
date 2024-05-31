<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validation($request->all());
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');

        $newPost = new Post();
        $newPost->fill($validatedData);
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validation($request->all());
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    private function validation($data)
    {
        return Validator::make(
            $data,
            [
                'name' => 'required|string|min:5|max:50',
                'slug' => 'required|string|max:50',
                'client_name' => 'required|string|max:255',
                'summary' => 'nullable|string',
            ],
            [
                'name.required' => 'Il campo name è obbligatorio',
                'name.max' => 'Il campo name non può avere più di 50 caratteri',
                'name.min' => 'Il campo name deve avere almeno 5 caratteri',
                'slug.required' => 'Il campo slug è obbligatorio',
                //'slug.unique' => 'Il campo slug deve essere unico',
                'client_name.max' => 'Il campo client_name non può avere più di 255 caratteri',
                'client_name.required' => 'Il campo client_name è obbligatorio',
            ]
        )->validate();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
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
        $tags = Tag::all();
        
        $categories = Category::all();
        return view('admin.posts.index' , compact('posts', 'categories', 'tags'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.new', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate($this->validationData(),$this->validationErrors());

        $data = $request->all();

        $new_post = new Post();

        $new_post->fill($data);

        $new_post->slug = Str::slug($new_post->title, '-');

        $new_post->save();

        if(array_key_exists('tags', $data)){
            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $new_post);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tags = Tag::all();
        return view('admin.posts.post', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();
        if($post){
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        }
        abort(404, 'qualcosa è andato storto, torna alla home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate($this->validationData(), $this->validationErrors());

        $data = $request->all();

        $data['slug']= Str::slug($data['title']);

        $post->update($data);

        
        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }else{
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', "il Post intitolato $post->title stato eliminato correttamente.");

    }

    private function validationData(){
        return [
            'title' => 'required|max:49|min:3',
            'content' => 'required|min:10'
        ];
    }

    private function validationErrors(){
        return [
            'title.required' => 'Questo è un campo obbligatorio',
            'title.max'=> 'Hai superato il limite massimo di caratteri.',
            'title.min' => 'Devi inserire almeno 4 caratteri.',
            'content.required' => 'Questo è un campo obbligatorio.',
            'content.min' => 'Devi inserire almeno 11 caratteri.'
        ];
    }
}

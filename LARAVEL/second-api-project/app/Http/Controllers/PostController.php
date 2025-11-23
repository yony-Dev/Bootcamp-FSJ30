<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        // Query Builder
        // return Post::getAllPostsWithAuthorsQueryBuilder();

        //Eloquent
       $posts = Post::with(['user'])->get();

       return response()->json([
        'data' => $posts,
        'status' => 200
       ],200);


       }catch(Exception $error){
            return response()->json([
            'error' => $error->getMessage()
            ]);
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        //Create con eloquent y sin los modelos relacionados
        //$post = Post::create($request->all());

        //Create con los modelos relacionados
        $post = $request->user()->posts()->create($request->all());

        //Create extrayendo los datos del request y extrayendo el user_id del usuario autenticado
        /*
        $postcito = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id
        ]); */

        return response()->json([
            'message' => 'Post Created Successfully',
            'data' => $post,
            'status' => 201
        ],201);

         }catch(Exception $error){
            return response()->json([
            'error' => $error->getMessage()
            ]);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            //Buscar el post por su id y sino falla la ejecucion
            $post = Post::findOrFail($id);

            //Actualizamos el post
            $post->update($request->all());

            //Segunda manera de actualizar
           /* $request->title && $post->title = $request->title;
            $post->content = $request->content;
            $post->save(); */

            //Tercera manera de actualizar
            /*
            $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);*/
            
            return response()->json([
                'message' => 'Post Updated Successfully',
                'data' => $post,
                'status' => 200
            ],200);


        }catch(Exception $error){
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
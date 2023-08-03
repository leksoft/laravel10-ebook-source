<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return ArticleResource::collection($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
           // 'images' => 'required|images|mimes:jpeg,png,jpg,gif,svg|max:6048'
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        
        if ($images = $request->images) {
            foreach ($images as $image) {
                $article->addMedia($image)->toMediaCollection('images');
            }
        }

        return [
            'message' => 'Article created successfully',
            'data' => new ArticleResource($article)
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
           // 'images' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        if ($images = $request->images) {
            $article->clearMediaCollection('images');
            foreach ($images as $image) {
                $article->addMedia($image)->toMediaCollection('images');
            }
        }

        return [
            'message' => 'Article updated successfully ',
            'data' => new ArticleResource($article)
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return response(null, 204);
    }
}
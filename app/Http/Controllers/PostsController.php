<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Depart ; 
use Illuminate\Http\JsonResponse;
class PostsController extends Controller
{
    
    public function show($id){

        $posts = Post::find($id); 
        return view('post.show',compact('posts'));

    }

      //หน้าแรกบทความ
    public function index(Request $request)
    {

        if ($request->has('trashed')) {
            $posts = Post::onlyTrashed()->Paginate(10);
        } else {
            $posts = Post::Paginate(10);
        }

            return view('post.index',compact('posts'));
    }

    //หน้าเพิ่มบทความ
    public function create(){
        return view('post.create');
    }

    //บันทึกบทความ
    public function store(Request $request){

            $title = $request->input('post_title') ; 
            $detail = $request->post_detail; 

            \DB::insert('insert into posts (post_title,post_detail) values (?,?)',[$title,$detail]);

            return "บันทึกรายการเรียบร้อยแล้ว";

    }
    //เรียกฟอร์มแก้ไข views/post/edit.blade.php 
    public function edit($id){

            $post = \DB::select('select * from posts where id = ?',[$id]);

            return view('post.edit',compact('post'));

    }

    //แก้ไขข้อมูลตาม ID ที่ส่งเข้ามา 
    public function update(Request $request ,$id){

        $title = $request->input('post_title') ;
        $detail = $request->input('post_detail'); 

        \DB::update('update posts set post_title = ? , post_detail = ? where id = ?',[$title,$detail,$id] );
        return redirect('/posts'); 

    }

    //ลบข้อมูล
    public function destroy($id) { 
        
      //  $post = \DB::delete('delete from posts where id = ?',[$id]);
        Post::where('id',$id)->delete();

        return redirect('/posts');

    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->latest()->get();
        return redirect('/posts');
    }

    public function restore($id)
    {
        Post::where('id',$id)->restore();
        return redirect('/posts');
    }

    public function restoreAll(){
        Post::onlyTrashed()->restore();
        return redirect('/posts');
    }

    public function upload(Request $request): JsonResponse{
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(('uploads'), $fileName);

            $url = asset('uploads/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}

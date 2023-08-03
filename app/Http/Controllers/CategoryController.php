<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

use App\Models\Category ; 
use Session ; 
class CategoryController extends Controller
{

    public function index() { 

        //$category = DB::table('categories')->get();

        //$category = Category::all() ; 
        $category = Category::take(40)->get() ; 

        return view('category.index',compact('category')); 
        
    }

    public function create(){ 
        
        return view('category.create');

    }

    public function store(Request $request){

        // $data  = [
        //     'category_name' => $request->category_name
        // ] ; 
        // DB::table('categories')->insert($data);

        $category = new Category(); 
        $category->category_name = $request->category_name ; 
        $category->save();

        Session::flash('success','บันทึกข้อมูลเรียบร้อยแล้ว');
        //บันทึกแล้วกลับไปที่หน้าฟอร์มกรอกข้อมูล
        return redirect()->back(); 

    }

    public function edit($id){

        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('category'));

    }

    public function update(Request $request , $id){ 
        // $data  = [
        //     'category_name' => $request->category_name
        // ] ; 
        // DB::table('categories')->where('id',$id)->update($data);

        $category = Category::find($id); 
        $category->category_name = $request->category_name ; 
        $category->update();  //ใช้ save() ก็ได้ 
        //บันทึกแล้วกลับไปที่หน้าแสดงข้อมูล
        return redirect('/category')  ;
    }

    public function destroy($id) { 

       // DB::table('categories')->where('id',$id)->delete();

        $category = Category::destroy($id) ; 

        //][แล้วกลับไปที่หน้าแสดงข้อมูล
        return redirect('/category')  ;

    }

}

<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
           // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4048',

        ];
    }
    public function messages(){
        return [
            'name.required' => 'กรุณาระบุชื่อสินค้า',
            'price.required' => 'กรุณากำหนดราคาสินค้า',
            'stock.required' => 'กรุณาระบุจำนวนสินค้าที่มีในสต๊อก',
           // 'image.*' => 'รองรับไฟล์รูปนามสกุล jpg,png,jpeg,gif,svg',
        ];
    }
}

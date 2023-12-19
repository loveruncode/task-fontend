<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;

class PostController extends Controller
{
     public function index(){

        // $posts = Post::all();

        // return view('table.post', compact('posts'));
        return view ('table.post');

     }

     public function getData(){

        $model = Post::query();
        return DataTables::of($model)->toJson();

     }

     public function ckeditor(){


            return view ('table.ckeditor');
     }

     public function kiemtraInput(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:30|regex:/^[a-zA-Z0-9 ]+$/',
            'body' => 'required|string',
            'upload' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size
        ], [
            'title.required' => 'Trường title là bắt buộc.',
            'title.max' => 'Title không được dài hơn 30 ký tự.',
            'title.regex' => 'Title không được chứa ký tự đặc biệt.',
            'body.required' => 'Vui Lòng Nhập ở Body là bắt buộc.',
            'upload.image' => 'File phải là hình ảnh.',
            'upload.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'upload.max' => 'Kích thước hình ảnh không được lớn hơn 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            Log::info('File upload success:', ['fileName' => $fileName, 'url' => $url]);
        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);

        }

        return redirect()->back()->with('success', 'Thành Công');

     }






    }

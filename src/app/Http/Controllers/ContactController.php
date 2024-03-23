<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $categories=Category::all();
        session()->forget('selected_category');
        $tel1 = session('tel1','');
        $tel2 = session('tel2');
        $tel3 = session('tel3');
        return view('index',compact('categories','tel1','tel2','tel3'));
    }

    public function confirm(ContactRequest $request){
        $item = $request->only('first_name','last_name','gender','email','address','building','detail','tel1','tel2','tel3');
        $category_id = $request->input('category_id');
        $categoryContent = '';
        if($category_id){
            $categoryContent= $request->input('category_content_'.$category_id);
            $request->session()->put('selected_category', $category_id);
        }
        $tel1 = $request->input('tel1');
        $tel2 = $request->input('tel2');
        $tel3 = $request->input('tel3');
        $request->session()->flash('tel1', $tel1);
        $request->session()->flash('tel2', $tel2);
        $request->session()->flash('tel3', $tel3);
        $tell= $tel1 . $tel2 .$tel3;
        return view ('confirm',compact('item','tell','categoryContent','category_id'));
    }

    public function thanks(Request $request){
        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }
        $contents = $request->all();
        Contact::create($contents);
        return view('/thanks');
    }
    //contentはテーブルにないため"request->all"ではなく削除するか確認
}

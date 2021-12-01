<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('admin.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated= $request->validate([
'name'=>'required|unique:categories',
'slug'=>'required|unique:categories',
'content'=>'min:3'
        ]);
        // $category = new Category();
        // $category->name=$request->name;
        // $category->slug=$request->slug;
        // $category->content=$request->content;
        // $category->save();
       
        $category = Category::create($validated);
        //dd($category);
        // $file = $request->file('img');
        // // dd($file);
        // if($file){
        //     dd($file->store('public/uploads'));
        //     $file->store('public/uploads');
        //     $category->img = '/uploads/'.$file->getClientOriginalName();
        //     $category->save();
        // }
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
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
        $validated= $request->validate([
            'name'=>'required|unique:categories,name,'.$id,
            'slug'=>'required|unique:categories,slug,'.$id,
            'content'=>'min:3'
                    ]);
                   Category::findOrFail($id)->update($validated);
                    return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Category::findOrFail($id)->delete();
    //    return redirect('/admin/category');
        return redirect()->back();
    }
}

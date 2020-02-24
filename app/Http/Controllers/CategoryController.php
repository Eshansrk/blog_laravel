<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
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
//        $categories = Category::latest()->get();
//        $categories = Category::where('status', 0)->get();
//        $categories = Category::all();

        //pagination
        $categories = Category::latest()->paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['name' => 'required']);
//      Methos 1
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status ? 1 : 0;
        $category->save();

//Method 2
//        Category::create([
//            'name' => $request->name,
//            'description' => $request->description,
//            'status' => $request->status ? 1 : 0
//        ]);


//Method 3
//        $data = $request->all();
//        $request->status ? $data['status'] = 1 : $data['status'] = 0;

//        Category::create($data);





        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
//        dd($category);
//        return view('category.edit', ['category' => $category]);
//        return view('category.edit')->with(['category' => $category]);
//        return view('category.edit')->withCategory($category);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status ? 1 : 0;
        $category->save();

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
//        $category = Category::find($id);
        $category->delete();

        return back();

    }
}

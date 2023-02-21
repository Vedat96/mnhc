<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function navigation(){

        // $category = Category::find($id);
        $categories = Category::all();


        return view('navigation', compact('category'));
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $category = Category::create([
                'name' => $request->input('name'),
            ]);
            if($category){
                return redirect()->route('categories.index', ['category'=> $category->id])
                ->with('category_created', 'Category created succesfully!');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
        
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();  

        return redirect()->back()->with('category_updated', 'Category has been updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $categories = Category::all();
        $category = Category::find($id);
        $category->delete();

        // return view('categories.index', compact('categories'))->with('category_deleted', 'Category deleted succesfully!');

        return redirect('categories')->with('category_deleted', 'Category deleted succesfully!');
        // return redirect()->back()->with('category_deleted', 'Category deleted succesfully!');

    }
}

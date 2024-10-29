<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('adminpanel.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpanel.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:categories,title',
        ]);
    
        Category::create([
            'title' => $validatedData['title'],
        ]);
    
        return redirect()->route('category.index')
            ->with('success', 'Category created successfully');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        return view('adminpanel.category.index', ['cat'=>$cat, 'categories'=>Category::all()]);
    }

    /**
     */
    public function show($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:categories,title,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}

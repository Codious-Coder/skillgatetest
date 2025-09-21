<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()  { 
        $categories = Category::all();
        return view('backend.category.index', compact('categories')); 
    }
    public function create() { return view('backend.category.create'); }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => ['required','string','max:150','unique:categories,name'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = $r->boolean('is_active');
        Category::create($data);
        return redirect()->route('categories.index')->with('success','Category created');
    }

    public function edit(Category $category)
    { return view('backend.category.edit', compact('category')); }

    public function update(Request $r, Category $category)
    {
        $data = $r->validate([
            'name' => ['required','string','max:150', Rule::unique('categories','name')->ignore($category->id)],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = $r->boolean('is_active');
        $category->update($data);
        return back()->with('success','Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','Category deleted');
    }
}
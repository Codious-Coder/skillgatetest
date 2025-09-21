<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
class SubcategoryController extends Controller
{
    public function index()  { 
        $categories = Category::with('subcategories')->get();
        return view('backend.subcategory.index', compact('categories')); 
    }
    public function create() { 
        $categories = Category::orderBy('name')->get(); 
        return view('backend.subcategory.create', compact('categories')); 
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'category_id' => ['required','exists:categories,id'],
            'name' => ['required','string','max:150'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = $r->boolean('is_active');
        Subcategory::create($data);
        return redirect()->route('subcategories.index')->with('success','Subcategory created');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::orderBy('name')->get();
        return view('backend.subcategory.edit', compact('subcategory','categories'));
    }

    public function update(Request $r, Subcategory $subcategory)
    {
        $data = $r->validate([
            'category_id' => ['required','exists:categories,id'],
            'name' => ['required','string','max:150'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = $r->boolean('is_active');
        $subcategory->update($data);
        return back()->with('success','Subcategory updated');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back()->with('success','Subcategory deleted');
    }

    // Dependent dropdown endpoint
    public function byCategory(Request $r)
    {
        $r->validate(['category_id' => ['required','exists:categories,id']]);
        return Subcategory::where('category_id', $r->category_id)
            ->orderBy('name')
            ->get(['id','name']);
    }
}
<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json($category);
        }
        return response()->json(['success' => false, 'message' => 'Category not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Category not found'], 404);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => 'Category deleted successfully']);
    }
}

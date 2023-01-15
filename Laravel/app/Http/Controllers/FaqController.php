<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('faq.index', [
            'categories' => Category::all()
        ]);
    }

    public function destroy(Category $category) 
    {
        if(!auth()->user()->admin) {
            abort(403, 'Unautherized');
        }

        $category->delete();
        return redirect('/')-> with('message', 'Category deleted succesfully');
    }
}

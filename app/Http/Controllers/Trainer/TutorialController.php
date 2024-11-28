<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Category;
use App\Models\Tutorial;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $categories = Category::all();

        $category_id = $request->get('category');

        if ($category_id) {
            $tutorials = Tutorial::where('category_id', $category_id)->get();
        } else {
            $tutorials = Tutorial::all();
        }

       


        return view('trainer.tutorials.index', [
            'categories' => $categories,
            'tutorials' => $tutorials
        ]);
    }

    public function add_category(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required'
        ]);


        //insert
        Category::create([
            'name' => $request->name
        ]);

        //redirect
        return redirect()->back()->with('success', value: 'Category added sucessfully');
    }

    public function filter(){
        return redirect()->back();
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|unique:tutorials|max:255', 
            'description' => 'required|max:255',
            'link' => 'required| url',
            'category' => 'required'
        ]);

        Tutorial::create([
            'title' => $request->title,
            'description' => $request->description,
            'tutorial_links' => $request->link,
            'created_by' => FacadesAuth::id(),
            'category_id' => $request->category
        ]);


        return redirect()->back();


    }

}
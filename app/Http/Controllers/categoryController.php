<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    public function allCategory(Category $category){
        $data = $category->post()->paginate(6);
        return view('skeleton.posts', ['dataPost' => $data, 'category' => $category]);
    }

    public function createCat(){
        return view('skeleton/crud/cat_post');
    }

    public function storeCat(CategoryRequest $request, Category $cat){
        $data = $request->all();
        for($i = 0 ; $i < count($data['name']); $i++){
            $datas = array(
                'name' => $data['name'][$i],
                'slug' => Str::slug($data['name'][$i])
            );
            $cat->create($datas);
        }
         return redirect()->to('/posts/create');
    }

    public function pageCategory(Category $category){
        $categories = $category->orderBy('name', 'ASC')->get();
        return view('skeleton.tagcat', ['data' => $categories, 'category' => 'true']);
    }

}

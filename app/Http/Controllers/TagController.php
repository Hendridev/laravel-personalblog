<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function allTags(Tag $tag){
        $data = $tag->post()->paginate(6);
        return view('skeleton.posts', ['dataPost' => $data, 'tags' => $tag]);
    }

    public function createTags(){
        return view('skeleton/crud/tags_post');
    }

    public function storeTags(TagRequest $request,Tag $tag){
        $data = $request->all();
            for($i = 0 ; $i < count($data['name']); $i++){
                $datas = array(
                    'name' => $data['name'][$i],
                    'slug' => Str::slug($data['name'][$i])
                );
                $tag->create($datas);
            }
        return redirect()->to('/posts/create');
    }

    public function pageTags(Tag $tag){
        $data = $tag->orderBy('name', 'ASC')->get();
        return view('skeleton.tagcat', ['data' => $data, 'tags' => 'true']);
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{
    public function allPost(Post $post){
        $dataPost = $post->orderBy('id', 'DESC')->paginate(4);
        return view('skeleton/posts', ['dataPost' => $dataPost]);
    }

    public function allSlug(Post $post){
        $allPost = $post->where('category_id',$post->category_id)->paginate(4);
        return view('skeleton/post', ['dataPost' => $post, 'post' => $allPost]);
    }

    public function createPost(Post $post, Category $category){
        return view('skeleton/crud/create_post', ['datPost' => $post, 'categories' => $category->get() , 'tags' => Tag::get() , 'submit' => 'create']);
    }

    public function storePost(postRequest $request, Post $post){
        $getData = $request->all();
        // summernote secton
            $body = request('body');
            $dom = new \DOMDocument();
            $dom->loadHTML($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list($type, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "/post_image/".time().$k.'.png';
                $path = base_path().$image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            $body = $dom->saveHTML();
            $post->body = $body;
        // end
        $getData['slug'] = Str::slug(request('title'));

        if(request()->file('thumbnail')){
            $dataThumbnail = request()->file('thumbnail')->store('picture/posts');
        }
        else{
            $dataThumbnail = null;
        }

        $getData['thumbnail'] = $dataThumbnail;
        $getData['category_id'] = request('category');

        $indexPost = $post->create($getData);

        $indexPost->tags()->attach(request('tags'));

        session()->flash('success', 'Post berhasi di upload');
        return redirect()->to('/posts');
    }

    public function editPost(Post $post){
        return view('skeleton/crud/edit_post', ['datPost' => $post,'categories' => Category::get(), 'tags' => Tag::get() , 'submit' => 'update']);
    }

    public function updatePost(postRequest $request, Post $post){
        $getData = $request->all();
        $getData['slug'] = Str::slug(request('title'));

         // summernote secton
         $body = request('body');
         $dom = new \DOMDocument();
         $dom->loadHTML($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
         $images = $dom->getElementsByTagName('img');
         foreach($images as $k => $img){
             $data = $img->getAttribute('src');
             list($type, $data) = explode(';', $data);
             list($type, $data) = explode(',', $data);
             $data = base64_decode($data);
             $image_name = "/post_image/".$getData['slug'].time().$k.'.png';
             $path = public_path().$image_name;
             file_put_contents($path, $data);
             $img->removeAttribute('src');
             $img->setAttribute('src', $image_name);
         }
         $body = $dom->saveHTML();
         $post->body = $body;
     // end

        if(request()->file('thumbnail')){
            Storage::delete($post->thumbnail);
            $dataThumbnail = request()->file('thumbnail')->store('picture/posts');
        }
        else{
            $dataThumbnail = $post->thumbnail;
        }

        $getData['thumbnail'] = $dataThumbnail;

        $post->update($getData);
        $post->tags()->sync(request('tags'));

        session()->flash('success' ,'Post sudah ter-update');

        return redirect()->to('/posts');

    }

    public function deletePost(Post $post){
        Storage::delete($post->thumbnail);
        $post->tags()->detach();
        $post->delete();

        session()->flash('success', 'The post has been deleted');
        return redirect()->to('/posts');
    }

}

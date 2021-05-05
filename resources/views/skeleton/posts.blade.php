@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="d-flex mb-4 justify-content-between">
            @isset($category)
                <h4>{{$category->name}}</h4>
            @endisset
            @isset($tags)
                <h4>#{{$tags->name}}</h4>
            @endisset
            <div>
                @if (!isset($category) && !isset($tags))
                    <h4>All Post</h4>
                @endif
            </div>
            @auth
            <div>
                <a class="btn btn-primary" href="{{route('createPost')}}">Upload posts</a>
            </div>
            @endauth
        </div>
        <div class="row">
            @forelse ($dataPost as $post)
                <div class="col-md-6">
                    <div class="card mb-4" >
                        <img src="{{asset("/storage/".$post->thumbnail)}}" alt="" class="image-top" style="max-height:280px">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <small>
                                    <a href="{{route('allCategory', $post->category->slug)}}">{{$post->category->name}}</a>
                                    &middot;
                                    @foreach ($post->tags as $tag)
                                    <a href="{{route('allTags', $tag->slug)}}">#{{$tag->name}}</a>
                                    @endforeach
                                </small>
                            </div>
                            <div class="font-weight-bold">
                                <a class="text-dark" href="{{route('slug', $post->slug)}}" style="font-size: 16px">{{Str::limit($post->title,40,'...')}}</a>
                            </div>
                            <div>
                                {!!Str::limit($post->body,60,'...')!!}
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <small class="font-weight-bold">Oleh : Hendridev</small>
                                <small>{{$post->created_at->format('d M Y')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    {{__('Tidak ada data yang ditemukan')}}
                </div>
                @endforelse
        </div>
        <div class="d-flex justify-content-first">
            {{$dataPost->onEachSide(4)->links('pagination::bootstrap-4')}}
        </div>
    </div>
    @endsection
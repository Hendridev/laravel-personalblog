@extends('layouts.app')
@section('title')
    {{$dataPost->title}}
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h4>{{$dataPost->title}}</h4>
                    <hr>
                </div>
                <div class="card" style="width: 100%">
                    <img src="{{asset("/storage/".$dataPost->thumbnail)}}" alt="" class="img-top" style="height:280px;object-fit: cover; object-position: center;">
                    <div class="card-body">
                    <div class=" d-flex justify-content-between mb-4">
                        <div>
                            <a href="/categories/{{$dataPost->category->slug}}">{{$dataPost->category->name}}</a>
                            @foreach ($dataPost->tags as $item)
                                <a href="/tags/{{$item->slug}}">#{{$item->name}}</a>
                            @endforeach
                        </div>
                        <div>
                            {{$dataPost->created_at->format('d M Y')}}
                        </div>
                    </div>
                    <div style="text-align: justify;">
                        {!!nl2br($dataPost->body)!!}
                    </div>
                    </div>
                    @auth
                    <div class="card-footer">
                        <form action="{{route('deletePost', $dataPost)}}" method="post">
                            @method('DELETE')
                            @csrf
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            <div class="card-footer">
                                <a href="{{route('editPost', $dataPost)}}">edit</a>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
            @guest
            <div class="col-md-4">
                <h3>Another post</h3>
                <hr>
                @foreach ($post as $item)
                    <div class="card">
                        <img src="{{asset('/storage/'.$item->thumbnail)}}" style="height:120px; object-fit:cover; object-posititon:center">
                        <div class="card-body">
                            <div>
                                <a href="/posts/{{$item->slug}}" class="font-weight-bold text-dark">{{Str::limit($item->title,60,'...')}}</a>
                                <hr>
                            </div>
                            {{Str::limit($item->body,50,'...')}}
                        </div>
                    </div>
                @endforeach
            </div>
            @endguest
        </div>
        <!-- Button trigger modal -->

        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </div>
        </div>
        </form>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection

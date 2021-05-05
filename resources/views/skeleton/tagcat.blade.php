@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row ">
            @foreach ($data as $item)
            <div class="col-md-4">
                <ol class="list-group list-group-numbered">
                  @isset($category)
                    @if (count($item->post) > 0)      
                    <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">
                          <a href="{{route('allCategory', $item->slug)}}">{{$item->name}}</a>
                        </div>
                        </div>
                        <span class="badge bg-light rounded-pill">{{count($item->post)}}</span>
                      </li>
                      @endif
                    @endisset
                    @isset($tags)
                      @if (count($item->post) > 0)
                      <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">
                            <a href="{{route('allTags', $item->slug)}}">#{{$item->name}}</a>
                          </div>
                        </div>
                        <span class="badge bg-light rounded-pill">{{count($item->post)}}</span>
                      </li>
                      @endif
                    @endisset
                </ol>
            </div>
            @endforeach
        </div>
    </div>
@endsection
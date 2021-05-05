@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Selamat datang di blog ku <span class="text-primary">{{Auth::user()->name}}!</span></h4>
                    <p>Ini adalah blog personal yang membahas tentang perkembangan teknologi terkini, baik itu jaringan, hardware atau software.
                       Dengan menggunakan teknologi Laravel 8, blog ini dapat menggunakan beberapa fitur unik.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

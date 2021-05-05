@auth
@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Upload Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="/categories/store" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="category">Category</label>
                                    <button type="button" class="btn btn-primary btn-append">+</button>
                                </div>
                                <input type="text" name="name[]" id="category" class="form-control mt-3">
                                @error('name')
                                    <div class="text-danger mt-3">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Upload category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let template = '<input type="text" name="name[]" id="tag" class="form-control mt-3">';
        let form = document.querySelector('.form-group');
        document.querySelector('.btn-append').addEventListener('click', function(){
            let temp = document.createElement('input');
            temp.classList.add('form-control');
            temp.classList.add('mt-3');
            temp.name = 'name[]';
            form.append(temp);
        });

    </script>
@endsection
@endauth

@extends('master')
@section('title') Create Article @endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{ route('articles.index') }}" class="btn btn-danger"> Back to Articles </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form action="{{ route('articles.store') }}" method="post">
            @csrf
            <div class="card shadow">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button class="close" type="button" data-dissmiss="alert"> x </button>
                        {{ Session::get('success') }}
                    </div>
                @elseif (Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button class="close" type="button" data-dissmiss="alert"> x </button>
                        {{ Session::get('failed') }}
                    </div>
                @endif

                <div class="card-header">
                    <h4 class="card-title"> Create Article </h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="title"> Title </label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" />
                        {!! $errors->first('title', "<span class='text-danger'> :message </span>") !!}
                    </div>

                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea name="description" id="description" class="form-control"> {{ old('description') }} </textarea>
                        {!! $errors->first('description', "<span class='text-danger'> :message </span>") !!}
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success" type="submit"> Save </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

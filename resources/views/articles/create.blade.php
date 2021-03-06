@extends('layout')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.css" rel="stylesheet" />
@endsection

 
@section('content')
<div id="wrapper">
<div id="page" class="container">
<h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
<form action="/articles" method="post"> 
            @csrf

            <div class="field">
                <label class="label" for="tags">Tags</label>
                <div class="select is-multiple control">
                <select multiple name="tags[]" id="tag">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
                </select>
                @error('tags')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="title">Title</label>
 
                <div class="control">
                    <!--<input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title">
                    @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif-->
                    <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
 
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>

                <div class="control">
                <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt" >{{ old('excerpt') }}</textarea>
                @error('excerpt')
                <p class="help is-danger">{{ $message }}</p>
                @enderror                    
                </div>
            </div>
 
            <div class="field">
                <label class="label" for="body">Body</label>
 
                <div class="control">
                  <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body">{{ old('body') }}</textarea>
                @error('body')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
                </div>
            </div>
            
            <div class="field is-grouped">
                <div class="control">
                  <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
</div>
</div>
@endsection

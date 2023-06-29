@extends('admin.layouts.base')

@section('title', 'Add Movie')

@section('content')
    <div class="row">
        <div class="col-xl-10">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Form Movie</h5>
                    <small class="text-muted float-end">
                        <a href="{{ route('admin.movie') }}" class="btn btn-secondary">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                                 </svg>
                             </span>
                             Back
                        </a>
                    </small>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data"  method="POST" action="{{ route('admin.movie.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ old('title')}}" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="eg. FAST X">
                            @error('title')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="trailer">Trailer</label>
                            <input type="text" name="trailer" value="{{ old('trailer')}}" id="trailer" class="form-control @error('trailer') is-invalid @enderror" placeholder="URL Trailer">
                            @error('trailer')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="movies">Full Movies</label>
                            <input type="text" name="movies" value="{{ old('movies')}}" id="movies" class="form-control @error('movies') is-invalid @enderror" placeholder="URL Movie">
                            @error('movies')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" value="{{ old('duration')}}" id="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="1h 30m">
                            @error('duration')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="casts">Casts</label>
                            <input type="text" name="casts" value="{{ old('casts')}}" id="casts" class="form-control @error('casts') is-invalid @enderror" placeholder="Vin Diseal, Jason Momoa">
                            @error('casts')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <input type="text" name="categories" value="{{ old('categories')}}" id="categories" class="form-control @error('categories') is-invalid @enderror" placeholder="Action,Comedy,Fantasy,Documenter">
                            @error('categories')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="small_thumbnail">Small Thumbnail</label>
                            <input type="file" name="small_thumbnail" value="{{ old('small_thumbnail')}}" id="small_thumbnail" class="form-control">
                            @error('small_thumbnail')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="large_thumbnail">Large Thumbnail</label>
                            <input type="file" name="large_thumbnail" value="{{ old('large_thumbnail')}}" id="large_thumbnail" class="form-control">
                            @error('large_thumbnail')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="release_date">Date</label>
                            <input type="text" id="release_date" value="{{ old('release_date')}}" name="release_date" class="form-control @error('release_date') @enderror datepicker">
                            @error('release_date')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                        <div class="form-group">
                            <label for="short_about">short_about</label>
                            <input type="text" name="short_about" value="{{ old('short_about')}}" id="short_about" class="form-control @error('short_about') is-invalid @enderror" placeholder="Awesome Movie">
                            @error('short_about')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="about">about</label>
                            <input type="text" name="about" value="{{ old('about')}}" id="about" class="form-control @error('about') is-invalid @enderror" placeholder="Awesome Movie">
                            @error('about')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="featured">Featured</label>
                            <select class="custom-select" name="featured">
                                <option value="0" {{ old('featured' === '0' ? 'selected' : '')}} >No</option>
                                <option value="1" {{ old('featured' === '1' ? 'selected' : '')}}>Yes</option>
                            </select>
                          </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <span class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                    </svg>
                                </span>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
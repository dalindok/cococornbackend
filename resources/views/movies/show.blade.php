@extends('layouts.app')

@section('content')
<main class="">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="">
                {{-- <div class="card shadow-sm"> --}}
                    <div class="text-2xl mb-2 row">
                        <strong>Movie Details</strong>
                         <div class="text-end">
                            {{-- <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-info">Edit</a> --}}
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>

                    <div class="ml-12">
                        <!-- Title -->
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label font-bold">Title :</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext ">{{ $movie->title }}</p>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label font-bold">Description :</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext ">{{ $movie->description }}</p>
                            </div>
                        </div>

                        <!-- Genre -->
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label font-bold">Genre :</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext ">
                                    {{ $movie->genres->pluck('name')->join(', ') ?: 'N/A' }}
                                </p>
                            </div>
                        </div>

                        <!-- Rating -->
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label font-bold">Rating Average:</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext ">
                                    {{ $movie->rating->name ?? 'N/A' }}
                                </p>
                            </div>
                        </div>

                        <!-- Release Date -->
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label font-bold">Release Date :</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext ">
                                    {{ \Carbon\Carbon::parse($movie->released_date)->format('F d, Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Actors -->
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label font-bold">Actors :</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext">
                                    {{ $movie->actors->pluck('name')->join(', ') ?: 'N/A' }}
                                </p>
                            </div>
                        </div>

                        
                        <!-- Poster -->
                        <div class="mb-2 row">
                                           <label class="col-md-2 col-form-label font-bold">Poster :</label>
                            <div class="col-md-9">
                                <img src="{{ $movie->poster}}" alt="Poster" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                            </div>
                        </div>
                                 <!-- Trailer -->
                                 <div class=" row">
                            <label class="col-md-2 col-form-label font-bold">Trailer :</label>
                            <div class="col-md-9">
                                <a href="{{ $movie->trailer}}" target="_blank" class="btn btn-outline-primary font-semibold">Watch Trailer</a>
                            </div>
                        </div>

                        <!-- Buttons -->

                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</main>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                
                <div class="">
                    @auth
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="text-center">Bentornato!</h1>
                        
                        <br>
                        <div class="col-12 d-flex justify-content-center">
                        <a class="btn btn-dark" href="/survey/create">Crea un questionario</a>
                        </div>
                        <!-- Iterazione sui survey e visualizzazione all'interno delle card -->
                        <div class="mt-4">
                            @foreach($surveys as $survey)
                                <div class="card mt-3">
                                    <div class="card-body shadow">
                                        <h5 class="card-title">{{ $survey->title }}</h5>
                                        <p class="card-text">{{ $survey->description }}</p>
                                        <p>{{date('d/m/y h:m:s', strtotime($survey->created_at))}}</p>
                                        <br>
                                        <a href="{{ route('survey.show', $survey->id) }}" class="btn btn-dark">Visualizza dettagli</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Fine iterazione sui survey -->

                    @else
                        <p>Devi essere loggato per visualizzare la dashboard.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

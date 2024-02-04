@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Le tue Survey</h2>
            <div class="list-group shadow">
                @foreach($surveys as $survey)
                    <a href="{{ route('survey.show', $survey->id) }}" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">{{ $survey->title }}</h5>
                        <small>{{ $survey->description }}</small>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

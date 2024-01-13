@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">{{$survey->title}}</h4>
                </div>
                <div class="card-body">
                    <p><small>{{$survey->description}}</small></p>
                    <p>{{date('d/m/y h:m:s', strtotime($survey->created_at))}}</p>
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-dark" href="/survey/{{$survey->id}}/question/create">Crea nuova domanda</a>
                    <a href="{{ route('survey.take', ['survey' => $survey->id, 'slug' => Str::slug($survey->title)]) }}" class="btn btn-success mx-2">Compila il questionario</a>
                    </div>
                    
                </div>
            </div>

            @foreach ($survey->questions as $question)
            <div class="card shadow mt-5">
                <div class="card-header d-flex justify-content-between">
                    <div>{{$question->question}}</div>
                    <div>{{$question->responses->count() > 0 ? $question->responses->count() : 'Nessuna Risposta'}}</div>
                </div>
                
                <div class="card-body">
                    <ul class="list-group">
                        @if (sizeof($question->answers) == 0)
                        <div class="text-danger"> nessuna risposta inserita </div>      
                        @else
                        @foreach ($question->answers as $answer)
                        <li class="list-group-item d-flex justify-content-between">
                         <div> {{$answer->answer}}</div>
                         @if($answer->responses->count() > 0)   
                         <div> {{intval($answer->responses->count()*100/$question->responses->count())}}%</div>
                         @endif  
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <div class="card-footer">
                        <form action="{{ route('survey.delete_questions', ['survey' => $survey->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Cancella domande del sondaggio</button>
                        </form>
                                             
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

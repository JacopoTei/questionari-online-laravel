@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h3 class="text-center">Compila il Questionario: {{$survey->title}}</h3>

           <form method="POST" action="{{ route('survey.take', ['survey' => $survey->id, 'slug' => Str::slug($survey->title)]) }}">
               @csrf <!-- Token CSRF di Laravel -->
               
               <div class="card shadow mt-5">
                   <div class="card-header">Inserisci Nome ed Email</div>
                   <div class="card-body">
                       <div class="mb-3">
                           <label for="name" class="form-label">Nome</label>
                           <input type="text" class="form-control" id="name" name="info[name]" value="{{ old('name') }}">
                           @error('info.name')
                               <small class="text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control" id="email" name="info[email]" value="{{ old('email') }}">
                           @error('info.email')
                               <small class="text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                   </div>
               </div>

               @foreach ($survey->questions as $key => $question)
                   <div class="card shadow mt-5">
                       <div class="card-header">{{$key+1}} : {{$question->question}}</div>
                       <div class="card-body">
                           @error('responses.'.$key.'.answer_id')
                               <small class="text-danger">{{$message}}</small>
                           @enderror
                           <ul class="list-group">
                               @foreach ($question->answers as $answer)
                                   <label for="answer_{{$answer->id}}">
                                       <li class="list-group-item">
                                           <input type="radio" name="responses[{{$key}}][answer_id]" id="answer_{{$answer->id}}" value="{{$answer->id}}" {{(old('responses.'.$key.'.answer_id') == $answer->id) ? 'checked' : ''}}>
                                           <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                           {{$answer->answer}}
                                       </li>
                                   </label>
                               @endforeach
                           </ul>
                       </div>
                   </div>
               @endforeach
               <button type="submit" class="btn btn-dark mt-3">Invia</button>
           </form>
        </div>
    </div>
</div>
@endsection

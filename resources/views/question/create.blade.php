@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>crea nuova domanda</h4>
                
                </div>

                <div class="card-body">
                    <form action="/survey/{{$survey->id}}/question/create" method="post">
                    @csrf

                    <div class="form-group">
                      <label for="question">domanda</label>
                      <textarea type="text" class="form-control" id="question" name="question" value="{{old('question')}}" rows="6" placeholder="Inserisci la domanda"></textarea>
                      @error('question')
                          <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="answer1">Scelta 1</label>
                        <input type="text" name="answers[][answer]" value="" class="form-control">
                        @error('answers.0.answer')
                        <small class="text-danger">{{$message}}</small>
                       @enderror  
                    </div>
                    <div class="form-group">
                        <label for="answer1">Scelta 2</label>
                        <input type="text" name="answers[][answer]" value="" class="form-control">
                        @error('answers.1.answer')
                        <small class="text-danger">{{$message}}</small>
                       @enderror 
                    </div>
                    <div class="form-group">
                        <label for="answer1">Scelta 3</label>
                        <input type="text" name="answers[][answer]" value="" class="form-control">
                        @error('answers.2.answer')
                        <small class="text-danger">{{$message}}</small>
                       @enderror 
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Salva</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

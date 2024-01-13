@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Crea il tuo questionario!</h1>
                        <form action="/survey/create" method="post">

                            @csrf

                            <div class="form-group">
                              <label for="title">Titolo</label>
                              <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo dell'articolo">
                              @error('title')
                                  <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="description">Testo</label>
                              <textarea class="form-control" id="description" name="description" rows="6" placeholder="Inserisci il testo dell'articolo"></textarea>
                              @error('description')
                                  <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-dark mt-2">Invia</button>
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>   

@endsection

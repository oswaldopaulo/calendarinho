@extends('layouts.default')
@section('content')

    <div class="container-fluid">
        <h1 class="mt-4">Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
            <li class="breadcrumb-item active">Evento</li>
        </ol>
        {{--        <div class="card mb-4">--}}
        {{--            <div class="card-body">--}}
        {{--               --}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit mr-1"></i>
                Dados do evento
            </div>


            <div class="card-body">

                @if (!empty($errors->all()))
                    <div class="alert alert-danger col-lg-12">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form role="form" action="{{ url('calendar/update')}}" class="form" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @if($r)
                        @if($r->id)
                            <input type="hidden" name="id" id="id" value="{{ $r->id}}"/>

                            @if(!empty($ignore))
                                @foreach($ignore as $i)
                                    <input type="hidden" id="ignore{{ $i }}" name="ignore{{ $i }}"
                                           value="{{ $r->$i }}"/>

                                @endforeach
                            @endif

                        @endif
                    @endif


                    <div class="form-group row">
                        <label for="title" class="col-sm-1 col-form-label">Titulo: </label>
                        <div class="col-sm-11">
                            <input type="text" name="title" id="title" class="form-control" required
                                   value="{{$r->title ?? old('title')}}">
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-1 col-form-label">Descrição: </label>
                        <div class="col-sm-11">
                            <textarea class="form-control" name="description" id="description" rows="3" cols=""
                                      required="required">{{$r->description ?? old('description') }}</textarea>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="start" class="col-sm-1 col-form-label">Inicio: </label>
                        <div class="col-sm-5">
                            <input type="datetime-local" name="start" id="start" class="form-control" required
                                   value="{{$r->start ?? $_GET['start'] ?? old('start')}}">
                        </div>
                        <label for="end" class="col-sm-1 col-form-label">Final</label>
                        <div class="col-sm-5">
                            <input type="datetime-local" name="end" id="end" class="form-control"
                                   value="{{$r->end ??$_GET['end'] ?? old('end') }}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-1 col-form-label">Cor: </label>
                        <div class="col-sm-1">
                            <input type="color" name="color" id="color"  required
                                   value="{{$r->color ?? old('color') ?? '#378006'}}">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="S" id="ativo" name="ativo"
                                   @if($r)
                                       @if($r->ativo=='S') checked @endif
                            @else
                                checked
                            @endif
                            >
                            <label class="form-check-label" for="ativo">
                                Ativo
                            </label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>


                </form>


            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-arrow-left">&nbsp;&nbsp;</i>Назад</a>
    <div class="col-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('company.update', $company->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="modal-title" id="exampleModalLabel">Изменить данные</h5>
                    <div class="form-group">
                        <label for="nameInput">Названия</label>
                        <input value="{{ $company->name }}" type="text" class="form-control" name="name" id="nameInput" placeholder="Названия компании" required>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input value="{{ $company->email }}" type="email" class="form-control" name="email" id="emailInput" placeholder="Email компании">
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="exampleFile">Логотип</label>
                            <input type="file" name="logo" class="form-control-file" id="imageFile" accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="col pt-3">
                            @if($company->logo)
                                <a data-lightbox="image-1" href="{{ asset($company->logo) }}"> <img src="{{ asset($company->logo) }}" height="50px" /></a>
                            @endif
                            Нет Логотипа

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addressInput">Адрес</label>
                        <input value="{{ $company->address }}" type="text" class="form-control" name="address" id="addressInput" placeholder="Адрес компании">
                    </div>

                    <div class="form-group">
                        <label for="coordInput">Коордианты <a target="_blank" href="https://yandex.ru/map-constructor/location-tool/">Получить в карте</a></label>
                        <input value="{{ $company->coord }}" type="text" class="form-control" name="coord" id="coordInput" placeholder="Координаты">
                    </div>

                    <div class="m-3">
                        <button type="submit" class="btn btn-primary d-inline-block">Изменить</button>
                    </div>
                </form>
            </div>
        </div>

</div>
@endsection




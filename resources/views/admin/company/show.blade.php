@extends('layouts.app')
@push('styles')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a16566a2-fec6-4a15-b00d-e4cdf028c758&lang=ru_RU" type="text/javascript">
    </script>
@endpush
@section('content')
<div class="container-fluid">
    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-arrow-left">&nbsp;&nbsp;</i>Назад</a>
    <div class="col-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">
                            <strong>
                                Name
                            </strong>
                        </th>
                        <th scope="col">
                            <strong>
                                Value
                            </strong>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Id</strong></td>
                            <td>{{ $company->id }}</td>
                        </tr>

                        <tr>
                            <td><strong>Названия</strong></td>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Логотип</strong></td>
                            <td>
                                @if($company->logo)
                                <img class="img-fluid" src="{{ asset($company->logo) }}" alt="{{ $company->id }}">
                                @else
                                    Нет Логотипа
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Адрес</strong></td>
                            <td>{{ $company->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>В карте</strong></td>
                            <td>
                                <div id="map" style="width: 600px; height: 400px"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>

</div>
@endsection
@push('scripts')
        <script type="text/javascript">
            // Функция ymaps.ready() будет вызвана, когда
            // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
            ymaps.ready(init);
            function init(){
                // Создание карты.
                var myMap = new ymaps.Map("map", {
                    // Координаты центра карты.
                    // Порядок по умолчанию: «широта, долгота».
                    // Чтобы не определять координаты центра карты вручную,
                    // воспользуйтесь инструментом Определение координат.
                    center: {{ $company->coord }},
                    // Уровень масштабирования. Допустимые значения:
                    // от 0 (весь мир) до 19.
                    zoom: 19
                });
            }
        </script>
@endpush



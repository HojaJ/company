@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h4>Компании</h4>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addItem">
                Добавить
            </a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Названия</th>
                            <th>Email</th>
                            <th>Логотип</th>
                            <th>Адрес</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name  }}</td>
                                <td>{{$data->email  }}</td>
                                <td><a data-lightbox="image-1" href="{{ asset($data->logo) }}"> <img class="lazy" data-src="{{ asset($data->logo) }}" height="30px" /></a></td>
                                <td>{{$data->address  }}</td>
                                <td>
                                    <a target="_blank" href="{{route('company.show', $data->id)}}" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-eye"></i> Посмотреть
                                    </a>
                                    <a href="{{route('company.edit', $data->id)}}" class="btn btn-info btn-sm text-white">
                                        <i class="fas fa-edit"></i> Редактировать
                                    </a>
                                    <form action="{{ route('company.destroy', $data->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm text-white"  id="remove-button-{{$data->id}}">
                                            <i class="fas fa-trash"></i> Удалить
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top:100px;">
            <div class="modal-content">
                <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить Компанию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput">Названия</label>
                            <input type="text" class="form-control" name="name" id="nameInput" placeholder="Названия компании" required>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email</label>
                            <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email компании">
                        </div>
                        <div class="form-group">
                            <label for="imageFile">Логотип</label>
                            <input type="file" name="logo" class="form-control-file" id="imageFile" accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="form-group">
                            <label for="addressInput">Адрес</label>
                            <input type="text" class="form-control" name="address" id="addressInput" placeholder="Адрес компании">
                        </div>
                        <div class="form-group">
                            <label for="coordInput">Коордианты <a target="_blank" href="https://yandex.ru/map-constructor/location-tool/">Получить в карте</a></label>
                            <input type="text" class="form-control" name="coord" id="coordInput" placeholder="Координаты">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script type="text/javascript">
            $(function () {
                var lazyLoadInstance = new LazyLoad({});
                var table = $('#dataTable').DataTable({
                    stateSave: true,
                    drawCallback: function(){
                        lazyLoadInstance.update();
                    }
                });

                $('#dataTable tbody').on('click', "[id^='remove-button-']", function (event) {
                    var id = $(this).attr('id');
                    id = id.replace("remove-button-",'');
                    event.preventDefault();
                    Swal.fire({
                        title: "Удалит?",
                        icon: 'warning',
                        showCancelButton: true,
                        reverseButtons: true,
                        confirmButtonColor: '#0CC27E',
                        cancelButtonColor: '#FF586B',
                        confirmButtonText: 'Да удали!',
                        cancelButtonText: 'Нет!',
                        confirmButtonClass: 'btn btn-success ml-1',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#remove-button-'+id).parent().submit();
                        } else{
                            Swal.fire(
                                'Cancelled',
                                'Отмена',
                                'error'
                            )
                        }
                    })
                });

            });
        </script>

    @endpush
@endsection

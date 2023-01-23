@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h4>Сотрудники</h4>

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
                            <th>Телефон</th>
                            <th>Компания</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name  }}</td>
                                <td>{{$data->email  }}</td>
                                <td>{{$data->phone  }}</td>
                                <td>{{$data->company->name  }}</td>
                                <td>
                                    <a href="{{route('employee.edit', $data->id)}}" class="btn btn-info btn-sm text-white">
                                        <i class="fas fa-edit"></i> Редактировать
                                    </a>
                                    <form action="{{ route('employee.destroy', $data->id) }}" method="POST" class="d-inline-block">
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
                <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить Сотрудника</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput">Названия</label>
                            <input type="text" class="form-control" name="name" id="nameInput" placeholder="Названия Сотрудника" required>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email</label>
                            <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email Сотрудника">
                        </div>

                        <div class="form-group">
                            <label for="phoneInput">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phoneInput" placeholder="Телефон Сотрудника">
                        </div>

                        <div class="form-group">
                            <label for="companySelect">Выбрать компанию</label>
                            <select class="form-control" name="company_id" id="companySelect" required >
                                <option value="" selected disabled hidden>Выбрать компанию</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
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
                var table = $('#dataTable').DataTable({
                    stateSave: true,
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

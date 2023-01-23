@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-arrow-left">&nbsp;&nbsp;</i>Назад</a>
    <div class="col-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="modal-title" id="exampleModalLabel">Изменить данные</h5>
                    <div class="form-group">
                        <label for="nameInput">Названия</label>
                        <input value="{{ $employee->name }}" type="text" class="form-control" name="name" id="nameInput" placeholder="Названия сотрудника" required>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input value="{{ $employee->email }}" type="email" class="form-control" name="email" id="emailInput" placeholder="Email сотрудника">
                    </div>

                    <div class="form-group">
                        <label for="phoneInput">Телефон</label>
                        <input value="{{ $employee->phone  }}" type="text" class="form-control" name="phone" id="phoneInput" placeholder="Телефон Сотрудника">
                    </div>


                    <div class="form-group">
                        <label for="companySelect">Выбрать компанию</label>
                        <select class="form-control" name="company_id" id="companySelect" required>
                            @foreach($companies as $company)
                                <option @if($company->id === $employee->company->id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-3">
                        <button type="submit" class="btn btn-primary d-inline-block">Изменить</button>
                    </div>
                </form>
            </div>
        </div>

</div>
@endsection




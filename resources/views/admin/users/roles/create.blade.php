@extends('admin.layouts.master')
@section('head-tag','داشبورد |کاربران | نقش ها |نقش جدید')
@section('content')

    <div class="row mt-30">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">اضافه کردن نقش</h4>
                        <h4 class="header-title"><a href="{{ route('roles.index') }}" class="btn btn-danger">بازگشت</a>
                        </h4>
                    </div>
                    <form method="POST" action="{{ route('roles.store') }}" id="form">
                        @csrf
                        <div class="form-group my-2">
                            <label for="name">عنوان نقش</label>
                            <input class="form-control  @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" >
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



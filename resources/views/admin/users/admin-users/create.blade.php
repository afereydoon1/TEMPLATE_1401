@extends('admin.layouts.master')

@section('head-tag','داشبورد | ساخت ادمین جدید')

@section('content')
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کاربر ادمین
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin_user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin_user.store') }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام و نام خانوادگی</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('full_name') is-invalid @enderror"
                                           name="full_name" value="{{ old('full_name') }}">
                                    @error('full_name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                     </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <input type="email"
                                           class="form-control form-control-sm @error('email') is-invalid @enderror "
                                           name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">رمز عبور</label>
                                    <input type="password"
                                           class="form-control form-control-sm @error('password') is-invalid @enderror"
                                           name="password" value="{{ old('password') }}">
                                    @error('password')
                                    <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تأیید رمز عبور</label>
                                    <input type="password"
                                           class="form-control form-control-sm @error('password') is-invalid @enderror"
                                           name="password_confirmation" value="{{ old('password') }}">
                                    @error('password')
                                    <span class="invalid-feedback">
                                      {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">موبایل</label>
                                    <input type="text"
                                           class="form-control form-control-sm @error('mobile') is-invalid @enderror "
                                           name="mobile" value="{{ old('mobile') }}">
                                    @error('mobile')
                                    <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وضعیت</label>
                                    <select name="status"
                                            class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0">غیر فعال</option>
                                        <option value="1">فعال</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">
                                {{ $message }}
                           </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection



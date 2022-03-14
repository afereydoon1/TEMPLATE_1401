@extends('admin.layouts.master')

@section('head-tag','داشبورد |کاربران | نقش ها |تخصیص نقش')

@section('content')

    <div class="row mt-30">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> تخصیص نقش به ادمین {{ $user->full_name }}</h4>
                        <h4 class="header-title"><a href="{{ route('admin_user.index') }}"
                                                    class="btn btn-danger">بازگشت</a>
                        </h4>
                    </div>
                    <div class="row">
                        @foreach($roles as $role)
                            <div class="col-md-4 mb-4">
                                <div class="check-box-item d-flex align-items-center">
                                    <input type="checkbox" name="" id="{{ $role->id }}" class="mr-1"
                                           onchange="checkRole({{ $role->id }})"
                                           data-url="{{ route('model_has_role.givRoleToAdmin',$user->id) }}"
                                           @if($user->hasRole($role->name)) checked @endif>
                                    <label for="{{ $role->id }}" class="mb-0">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function checkRole(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked')

            $.ajax({
                url: url,
                type: "GET",
                data: {id: id},
                success: function (response) {
                    if (response.status) {
                        if (response.checked)
                            element.prop('checked', true);
                        else
                            element.prop('checked', false);
                    } else {
                        element.prop('checked', elementValue);
                    }
                }
            })
        }
    </script>
@endsection



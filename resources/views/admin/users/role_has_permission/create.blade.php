@extends('admin.layouts.master')

@section('head-tag','داشبورد |کاربران | نقش ها | تخصیص دسترسی')

@section('content')

    <div class="row mt-30">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">تخصیص دسترسی به نقش {{ $role->name }}</h4>
                        <h4 class="header-title"><a href="{{ route('roles.index') }}" class="btn btn-danger">بازگشت</a>
                        </h4>
                    </div>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-4 mb-4">
                                <div class="check-box-item d-flex align-items-center">
                                    <input type="checkbox" name="" id="{{ $permission->id }}" class="mr-1"
                                           onchange="givePermission({{ $permission->id }})"
                                           data-url="{{ route('role_has_permission.givPermissionToRole',$role->id) }}"
                                           @if($role->hasPermissionTo($permission->name)) checked @endif>
                                    <label for="{{ $permission->id }}" class="mb-0">
                                        {{ $permission->name }}
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
        function givePermission(id) {
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


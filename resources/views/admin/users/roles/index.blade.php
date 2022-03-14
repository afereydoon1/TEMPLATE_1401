@extends('admin.layouts.master')
@section('head-tag','داشبورد |کاربران|لیست نقش ها')
@section('content')
    <div class="row mt-30">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="main-body-container-header">
                        <h5 class="header-title">لیست نقش ها</h5>
                    </section>
                    <section class="d-flex justify-content-between">
                        <h4 class="header-title"><a href="{{ route('roles.create') }}" class="btn btn-info btn-sm">تعریف نقش جدید</a></h4>
                        <div class="max-width-16-rem">
                            <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                        </div>
                    </section>

                    <table class="table w-100 nowrap custom_setting_dataTable">
                        <thead>
                        <tr>
                            <th class="text-center">#id</th>
                            <th class="text-center">عنوان نقش</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $role)
                        <tr class="table_middle text-center">
                            <td class="text-center">{{ $key +=1 }}</td>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">
                                <label>
                                    <input id="{{ $role->id }}" onchange="changeStatus({{ $role->id }})" data-url="{{ route('roles.status',$role->id) }}" type="checkbox" @if($role->status === 1) checked @endif>
                                </label>
                            </td>
                            <td class="text-center">
                                <div class="d-block text-center">
                                    <a href="{{ route('role_has_permission.create', $role->id) }}" class="btn btn-primary btn-sm">تخصیص دسترسی</a>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline" action="{{ route('roles.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked')

            $.ajax({
                url:url,
                type:"GET",
                success : function (response) {
                    if(response.status)
                    {
                        if (response.checked)
                            element.prop('checked',true);
                        else
                            element.prop('checked',false);
                    }
                    else
                    {
                        element.prop('checked',elementValue);
                    }
                }
            })
        }
    </script>

@endsection


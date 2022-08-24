@extends('layouts.admin.master')
@section('content')

<div class="col-md-9">
        <table class="table table-bordered table-all">
            <div class="row">
                <div class="col-md-8 " style="margin-top: 10px;">
                    <div class="main-right">
                        <a href="{{ route('admin.customer.create') }}" style="width:120px" type="button" class="btn btn-primary"><i style="padding-right:5px" class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>
                        <button type="button" class="btn btn-danger"><i style="padding-right:5px" class="fa fa-trash" aria-hidden="true"></i>Xóa tất cả</button>
                        <button type="button" class="btn btn-danger"><i style="padding-right:5px" class="fa fa-sign-in" aria-hidden="true"></i>Chuyển người quản lý</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main_but">
                        <form action="" class="form-inline ">
                            <div style="margin-top: 20px; display:flex; height:40px" class="form-group ">
                                <input class="form-control " name="key" placeholder="Search by name..">
                                <button style="height: 40px; width:150px; margin-top:0px" class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style="margin-top: 10px" class="border-top border-primary border-2">
                <form>
                    <p>Tìm kiếm</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Loại khách</option>
                                    <option value="1">Khách lẻ</option>
                                    <option value="2">Khách hàng thân thiết</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Người quản lý</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button style="margin-top: -2px" type="button" class="btn btn-success"><i style="padding-right:5px" class="fa fa-search" aria-hidden="true"></i>Tìm kiếm</button>
                                <button style="margin-top: -2px" type="button" class="btn btn-danger"><i style="padding-right:5px" class="fa fa-times" aria-hidden="true"></i>Hủy lọc</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div style="margin-top: 10px" class="border-top border-primary border-2">
                <div style="display: flex;" class="list">
                    <p style="padding-top: 10px">Danh sách thông tin KH</p>
                    <button type="button" class="btn btn-success">Xuất file excel khách hàng</button>
                    <button type="button" class="btn btn-success">Xuất file excel khách hàng chi tiết</button>
                </div>
                <thead>
                <tr>
                    <th scope="col">Loại khách</th>
                    <th scope="col">Mã KH</th>
                    <th scope="col">Thông tin KH</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            @if(!empty($customers))
            @foreach($customers as $customer)
            <tr>
                <td>
                  <select name="" id="">
                    @foreach($customer->roles as $role)
                  <option> {{ $role->name }} </option>
                    @endforeach
                  </select>
                </td>
                <td>
                    <span class="cat-links">
                        {{ $customer->makh }}
                    </span>
                </td>
                <td>
                    <span class="cat-links">
                        {{ $customer->name }}
                    </span>
                </td>
                <td>
                    <span class="cat-links">
                        {{ $customer->address }}
                    </span>
                </td>
                <td>
                    <span class="cat-links">
                    {{ $customer->phone }}
                    </span>
                </td>
                <td>
                    <span class="cat-links">
                    {{ $customer->email }}
                    </span>
                </td>
                <td>
                  <select name="" id="">
                    @foreach($customer->users as $user)
                  <option> {{ $user->name }} </option>
                    @endforeach
                  </select>
                </td>
                <td>
                    <a href="{{ route('admin.customer.edit', $customer->id) }}" style="width:50px" class="btn btn-primary"> {{__('message.edit')}} </a>
                    <form class="d-inline" onclick="return confirm('Do you want to delete?')" method="post" action="{{ route('admin.customer.destroy', $customer->id) }}">
                        @csrf
                        @method('DELETE')
                        <button style="width: 70px; margin-left:0px" type="submit" class="btn btn-danger"> {{ __('message.delete')}} </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
            </div>
        </table>

        {{ $customers->links()}}
      </div>
@endsection

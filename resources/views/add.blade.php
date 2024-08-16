@extends('main')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">

            <div class="col-md-6">
                <div class="form-group">
                    <label >Tên User</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Nhập tên User">
                </div>
            </div>
            <div class="form-group">
                <label >Email User </label>
                <input type="email" id="email" name="price" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label> Mật khẩu</label>
                <input type="password" id="password" value="{{old('password')}}" >
            </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
</form>
@endsection
@include('alert')
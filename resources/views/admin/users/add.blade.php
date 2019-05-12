@extends('admin.templates.master')

@section('title')
Thêm người dùng
@stop

@section('css')
style_add.css
@stop

@section('users')
active
@stop

@section('content')
<div class="content">
<a href="{{route('admin.users.index')}}"><img class="img_back" src="{{$AdminResUrl}}/images/img_back.png" /></a>
			<h1>Thêm người dùng</h1>

			@if(Session::has('msg'))
                @php
                $msg = Session::get('msg');
                $msg = trim($msg);
                $msgType = substr($msg, 0, 5);
                @endphp
                @if($msgType=='error' || $msgType=='Error')
                <p class="msg_err">{{Session::get('msg')}}</p>
                @else
                 <p class="msg">{{Session::get('msg')}}</p>
                @endif
            @endif		

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

			<form action="{{route('admin.users.add')}}" method="post">
                {{csrf_field()}}
                <div class="item_data">
					<p>Họ tên (Tên hiển thị):</p>
					<input type="text" name="fullname" class="txt_field" value="{{ old('fullname') }}">
				</div>

				<div class="item_data">
					<p>Số điện thoại hoặc email(* bắt buộc):</p>
					<input type="text" name="username" class="txt_field" value="{{ old('username') }}">
				</div>
			
				<div class="item_data">
					<p>Password (* bắt buộc):</p>
					<input type="password" name="password" class="txt_field">
				</div>
                <div class="item_data">
					<p>Nhập lại Password (* bắt buộc):</p>
					<input type="password" name="repassword" class="txt_field">
				</div>

                <div class="item_data">
					<p>Chức vụ (* bắt buộc):</p>
					<select class="txt_field" name="id_role">
                    @foreach($objItems_Role as $objItem)
                    @php
                    $name = $objItem->name;
                    $id = $objItem->id;
                    @endphp
                        @if(old('id_role') == $id)
						    <option value="{{$id}}" selected>{{$name}}</option>
                        @else
                            <option value="{{$id}}">{{$name}}</option>
                        @endif
                    @endforeach
					</select>
				</div>

				<input onclick="return confirm('Bạn chắc chắn về chức vụ của ngươì này chứ?')" type="submit" name="submit" value="Thêm" class="button btn_submit">
                <input type="reset" name="reset" value="Reset" class="button btn_reset">
				<a class="button btn_cancel" href="{{route('admin.users.index')}}">Hủy</a>

			</form>	
		</div>
		<div class="clr"></div>
@stop
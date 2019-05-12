<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập - Minimart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background: orange;text-align:center"> 
    <h1>Đăng nhập</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('msg'))
        @php
        $msg = Session::get('msg');
        $msg = trim($msg);
        $msgType = substr($msg, 0, 5);
        @endphp
        @if($msgType=='error' || $msgType=='Error')
        <p class="msg_err">{!!Session::get('msg')!!}</p>
        @else
            <p class="msg">{!!Session::get('msg')!!}</p>
        @endif
    @endif
    <form action="{{route('auth.auth.login')}}" method="post">
        {{csrf_field()}}
        Số điện thoại hoặc email: <input type="text" name="username" value="{{old('username')}}"/><br>
        Mật khẩu: <input type="password" name="password" /><br><br>
        <input type="submit" name="submit" value="Đăng nhập" />
        <input type="reset" name="reset" value="Reset" class="button btn_reset">
        <a class="button btn_cancel" href="{{route('minimart.index.index')}}">Hủy</a>
    </form>

    <a href="{{route('auth.auth.forgotPassword')}}">Quên mật khẩu</a>





</body>
</html>
<form method="post">

<!-- 防止跨域攻擊的機制(防別自己寫表單去連我的後端) -->
    @csrf 
    <!-- 1_
    <input name="a" value="{{(isset($a))?$a:''}}"><p></p>
    <input name="b" value="{{(isset($b))?$b:''}}"><p></p>
    <button>add</button>
    <input type="reset"> 
    -->

    <!-- blade語法：@代表php區段 
    
    @if (isset($result))
    <hr>
    Result: {{$result}}
    
    @else
    
    @endif
    -->
    <!-- request: old('')只用在驗證 -->
    uid: <input name="uid" value="{{old('uid')}}"><br>
    message: <input name="message" value="{{old('message')}}"><br>
    <!-- 格式一定要pwd_confirmation -->
    password: <input name="passwd" value="{{old('passwd')}}"><br>
    confirm: <input name="passwd_confirmation"><br>
    <input type="submit">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <label>{{"$error"}}</label>
    @endforeach
    @endif
</form>


<?php

// if(isset($result)){
//     print "Result: $result";
// }

?>

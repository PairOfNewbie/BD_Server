<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/6
 * Time: 17:16
 */

<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="/auth/login">
{!! csrf_field() !!}

<div>
    Username
    <input type="text" name="Username" value="{{ old('Username') }}">
</div>

<div>
    Password
    <input type="password" name="password" id="password">
</div>

<div>
    <input type="checkbox" name="remember"> Remember Me
</div>

<div>
    <button type="submit">Login</button>
</div>
</form>
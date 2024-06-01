@extends('layouts/main')

@section('login')

<div class="z-10 login_page  absolute top-0 left-0 w-full h-screen flex flex-col items-center justify-center bg-red-800" style="background:rgba(0, 0, 0, 0.5) !important" >
      
    <div class="top-0 opacity-100 absolute flex justify-center item-center card w-96 bg-base-100 shadow-xl p-4" style="z-index:2">
      <span onclick="login_admin()" class="w-fit material-symbols-outlined" style="cursor:pointer !important">
        keyboard_backspace
        </span>
        {{-- <h4 class="text-center">Login Page</h4> --}}
        <h5 class="text-center" >Login Page</h5>
        <p>Pesan Login : </p>
        <form class=" flex flex-col item-center" action="/login" method="post">
            <input class="w-full mb-3" type="text" placeholder="sdf" name="username" autofocus required>
            <input class="w-full mb-3" type="password" name="password" placeholder="password" required>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
  
</div>

@endsection

@include('common.header')


<x-message-banner message="User Login successfully home" class="success"/>

<style>
    .success{
        background: lightgreen;
        color: green;
        padding: 3px 10px;
        border-radius: 5px;
        font-size: 20px;
    }
</style>


<br>
<br>

<x-message-banner message="Please do perper routing" class="error"/>

<style>
    .error{
        background: lightcoral;
        color: black;
        padding: 3px 10px;
        border-radius: 5px;
        font-size: 20px;
    }
</style>

<h1>Home page</h1>
<a href="/about/Hasib">About</a>
<a href="/">Welcome</a>

@include('common.inner',['page'=> "This is home page"])

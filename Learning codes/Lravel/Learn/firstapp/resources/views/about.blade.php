@include('common.header')

<x-message-banner message="User Login successfully about" class="success"/>

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

<h1>About</h1>
<h1>{{ $name }}</h1>

@include('common.inner',['page'=> "This is about page"])

<!-- @includeif('common.innern',['page'=> "This is about page"]) -->


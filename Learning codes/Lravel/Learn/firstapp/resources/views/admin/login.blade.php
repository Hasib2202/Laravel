<h1>Admin login</h1>
<h1>{{ $name }}</h1>
<h1>{{$age}}</h1>

<h1>{{rand()}}</h1>

<h1>{{date('Y-m-d')}}</h1>


<h1>{{$users[2]}}</h1>

@if($name = 'Mostofa')
    <h1>Mostofa</h1>
@elseif($name = 'Mostofa2')
    <h1>Mostofa2</h1>
@else
    <h1>Mostofa3</h1>
@endif

@foreach($users as $user)
    <h1>{{$user}}</h1>
@endforeach

<div>
    @for($i = 1; $i<=10; $i++)
        <h1>{{$i}}</h1>
    @endfor
</div>
<div>
    <h2>URL Information</h2>
    <p>{{URL::current()}}</p>
    <p>{{URL::previous()}}</p>
    <p>{{URL::full()}}</p>
    <p>{{url()->current()}}</p>

    <a href="/about">About</a>
    <a href="{{URL::to('/home')}}">Home</a>
    <a href="{{URL::to('/about',['hasib'])}}">About Hasib</a>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>

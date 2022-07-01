<div>

    {{-- @if (\Session::has('succes'))
    <div class="alert-succes">
        {{\Session::get('succes')}}
    </div>
    @endif --}}
    @if (session('succes'))
    <div class="alert-succes">
        {{session('succes')}}
    </div>
    @endif
    @if (session('error'))
    <div class="alert-error">
        {{session('error')}}
    </div>
    @endif
    {{-- @if (\Session::has('error'))
    <div class="alert-error">
        {{\Session::get('error')}}
    </div>
    @endif --}}

    <h3>Name</h3>

    <form action="{{route('category.save')}}" method="POST">
        @csrf
        <input type="text" placeholder="name" name="name">
        <button type="submit">Submit</button>
    </form>
</div>

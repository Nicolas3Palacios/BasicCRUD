<div>
    <div>
        <h4>Info</h4>
        {{-- @foreach ($categories as $category) --}}
            {{-- {{$category->name}}
            <form action="{{route('category.update',['category'=>$category->id])}}" method="POST">
                @csrf
                <input type="text" name="name">
                <button type="submit">update</button>
            </form>
            <form action="{{route('category.delete',['category'=>$category->id])}}" method="POST">
                @csrf
                <button type="submit">delete</button>
            </form> --}}
            <table style="margin-left: 40.5%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                @foreach ($categories as $category )
                    <tr>
                        <td>
                            <form action="{{route('category.update',['category'=>$category->id])}}" method="POST" >
                                @csrf
                                <input type="text" name="name" placeholder="{{$category->name}}">
                                <button type="submit">update</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('category.delete',['category'=>$category->id])}}" method="POST">
                                @csrf
                                <button type="submit">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tbody>

                </tbody>
            </table>
        {{-- @endforeach --}}
    </div>
</div>

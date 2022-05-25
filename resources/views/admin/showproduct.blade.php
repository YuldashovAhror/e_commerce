<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')
</head>
<body>
    @include('admin.saidebar')
    @include('admin.navbar')

    <div style="padding-bottom: 30px" class="container-fluid page-body-wrapper" enctype="multipart/form-data">
        <div class="container" align="center">
            @if(session()->has('message'))
            <div class="alert alert-success">
    
            <button type="button" class="close" data-dismiss="alert">x</button>
    
            {{session()->get('message')}}
    
            </div>
    
            @endif

            <table>
                <tr style="background-color: black" align="center">
                    <td style="padding:20px">Title</td>
                    <td style="padding:20px">Description</td>
                    <td style="padding:20px">Quantity</td>
                    <td style="padding:20px">Price</td>
                    <td style="padding:20px">Image</td>
                    <td style="padding:20px">Update</td>
                    <td style="padding:20px">Delete</td>
                </tr>
                @foreach($datas as $data)
                <tr style="background-color: black; align-items:center" >
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->price}}</td>
                    <td><img height="200" width="200" src="/productimage/{{$data->image}}" alt=""></td>
                    <td>
                        <a href="{{route('updateview', $data->id)}}" class="btn btn-primary">Update</a>
                    </td>

                    <td>
                        <a href="{{route('deleteproduct',$data->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
    {{-- @include('admin.body')     --}}
    @include('admin.script')
</body>
</html>

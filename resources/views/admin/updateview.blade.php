<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">

    @include('admin.css')
</head>
<body>
    @include('admin.saidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title" >Add Product</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">x</button>

        {{session()->get('message')}}

        </div>

        @endif
        <form action="{{route('updateproduct',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div style="padding: 15px;">
                <label for="">Product title</label>
                <input style="color: black" type="text" name="title" placeholder="Give a product title" required value="{{$data->title}}">
            </div>
            
            <div style="padding: 15px;">
                <label for="">Price</label>
                <input style="color: black" type="number" name="price" placeholder="Give a price" required value="{{$data->price}}">
            </div>
            
            <div style="padding: 15px;">
                <label for="">Discription</label>
                <input style="color: black" type="text" name="des" placeholder="Give a product description" required value="{{$data->description}}">
            </div>
            
            <div style="padding: 15px;">
                <label for="">Quantity</label>
                <input style="color: black" type="text" name="quantity" placeholder="Product Quantity" required value="{{$data->quantity}}">
            </div>

            <div style="padding: 15px">
                <label for="">Old Image</label>
                <img height="150" width="150" src="/productimage/{{$data->image}}" alt="">

            </div>
            
            <div style="padding:15px">
                <label for="">Change the image</label>
                <input type="file" name="file">
            </div>
            
            <div style="padding:15px">
                
                <input class="btn btn-success" type="submit">
            </div>
            
        </form>    
        </div>
    </div>
    {{-- @include('admin.body')     --}}
    @include('admin.script')
</body>
</html>
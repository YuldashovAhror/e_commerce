<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')
    <style type="text/css">
        .title
        {
            font-size: 25px;
            color:white;
        }

        .label
        {
            display:inline-block;
            width: 200px;
        }
    </style>
</head>
<body>
    @include('admin.saidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title" >Add Product</h1>
        <form action="{{route('uploadproduct')}}" method="POST">
            @csrf 
            <div style="padding: 15px;">
                <label for="">Product title</label>
                <input style="color: black" type="text" name="title" placeholder="Give a product title" required>
            </div>
            
            <div style="padding: 15px;">
                <label for="">Price</label>
                <input style="color: black" type="number" name="price" placeholder="Give a price" required>
            </div>
            
            <div style="padding: 15px;">
                <label for="">Discription</label>
                <input style="color: black" type="text" name="des" placeholder="Give a product description" required>
            </div>
            
            <div style="padding: 15px;">
                <label for="">Quantity</label>
                <input style="color: black" type="text" name="quantity" placeholder="Product Quantity" required>
            </div>
            
            <div style="padding:15px">
                
                <input type="file" name="file">
            </div>
            
            <div style="padding:15px">
                
                <input class="btn btn-success" type="submit">
            </div>
            
        </form>    
        </div>
    </div>
    @include('admin.script')
</body>
</html>
<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="section-heading">
                <h2>Latest Products</h2>
                <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                <form action="{{route('search')}}" class="form-inline" style="float: right; padding:10px">
                    @csrf
                    <input class="form-control" type="search" name="search" placeholder="seach">

                    <input class="form-control" type="submit" value="Search" class="btn btn-success">

                </form>
            </div>
            </div>
            <!--  -->
            @foreach($datas as $data)
                <div class="col-md-4">
                    <div class="product-item" >
                        <a href="#" style="width: 200px; height: 200px;;">
                            <img src="/productimage/{{$data->image}}" alt="" style="width: 100%; height: 200px; object-fit: contain; object-position: center;">
                        </a>
                        <div class="down-content">
                        <a href="#"><h4>{{$data->title}}</h4></a>
                        <h6>{{$data->price}} $</h6>
                        <p>{{$data->description}}</p>
                        <form action="{{route('addcart',$data->id)}}" method="POST">
                            @csrf
                            <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity">

                            <br>

                            <input type="submit" class="btn btn-primary" id="btn" style="color: #340f8a" value="Add Cart">

                        </form>
                        <!-- <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li> 
                        </ul>
                        <span>Reviews (32)</span> -->
                        </div>
                    </div>
                </div>
            @endforeach

           
        </div>
    </div>
</div>
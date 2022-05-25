<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }

            else
            {
                return redirect()->back();
            }
        }

        else
        {
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request)
    {
        $data = new Product;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('productimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->des;
        $data->quantity=$request->quantity;
        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function showproduct()
    {
        $datas = Product::all();
        return view('admin.showproduct',[
            'datas' => $datas
        ]);
    }

    public function deleteproduct($id)
    {
        $data = Product::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updateview($id)
    {
        $data = Product::find($id);
        return view('admin.updateview',[
            'data' => $data
        ]);
    }

    public function updateproduct( Request $request, $id)
    {
        $data = Product::find($id);

        $image=$request->file;

        if($image)
        {

            $imagename=time().'.'.$image->getClientOriginalExtension();
            
            $request->file->move('productimage',$imagename);
            
            $data->image=$imagename;
        }

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->des;
        $data->quantity=$request->quantity;
        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully');
    }

    public function showorder()
    {
        $order = Order::all();
        return view('admin.showorder',[
            'order' => $order
        ]);
    }

    public function updatestatus($id)
    {
        $order = Order::find($id);

        $order->status = 'delivered';

        $order->save();

        return redirect()->back();
    }

}

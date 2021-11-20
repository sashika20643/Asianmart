<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\productsub;
use App\Models\categery;
use App\Models\catsub;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function add(Request $request){
        $product= new Product;
        $sub= new productsub;
        $this->validate($request,[
            'product_name' =>'required|min:2',
            'product_id' =>'required|min:2',
            'product_description' =>'required|min:20|max:950',
            'product_image' =>'required|mimes:jpg,png,jpeg|max:5048',
            'Video_link1' =>'required|min:2',
            'Video_link2' =>'required|min:2',
            'product_price' =>'required|numeric',
            'product_discount' =>'required|numeric',
            'product_quantity' =>'required|numeric',
       



        ]);
        
        if(!Product::where('product_id',$request->product_id)->exists()){
       
            $newImageName=time().'-'.$request->product_id.'.'.$request->product_image->extension();
            $request->product_image->move(public_path('product_images'),$newImageName);
            $product->product_id=$request->product_id;
            $product->name=$request->product_name;
            $product->description=$request->product_description;
            $product->image=$newImageName;
            $product->vlink1=$request->Video_link1;
            $product->vlink2=$request->Video_link2;
            $product->price=$request->product_price;
            if($request->d_type === "Rs"){
                $discount=((float)$request->product_discount/(float)$request->product_price)*100;
                $product->discount=$discount;
            }
           else{
            $product->discount=$request->product_discount;
           }
            $product->quantity=$request->product_quantity;
            $product->categery=$request->categery;
            $product->status=$request->status;
            $product->save();
            $sub->subcat_id =$request->s_cat;
            $sub->product_id=$request->product_id;
            $sub->save();
            return redirect()->back()->with('alert','successfuly added');
        } 
        else{
            return redirect()->back()->with('alert','exist');
        }
  


   
  
    }

    public function subcatselect(Request $request){
//    $sub=catsub::where('cat_id',$request->cat_id);
try {
    $data=catsub::where('cat_id',$request->cat_id)->get();
return $data;
} catch (\Throwable $th) {
    //throw $th;
    return 'fales';
}



    }


    public function  subCatAdd(Request $request){ 
        $sub=new catsub;
        $this->validate($request,[
            'subcat_name' =>'required|min:2', 
            'subcat_id' =>'required|min:2',
        ]);
        if(!catsub::where('subcat_id',$request->subcat_id)->exists()){
        $sub->cat_id=$request->categery;
        $sub->subcat_id=$request->subcat_id;
        $sub->subcatname=$request->subcat_name;
        $sub->save();
        return redirect()->back()->with('alert','successfuly added');
    }
    else{
        return redirect()->back()->with('alert','exist');
    }

    }
    public function deleteproduct($product_id){
        $prod=Product::where('product_id',$product_id);
        // $image=$prod->image;
      unlink("product_images/".$prod->first()->image);
        $prod->delete();
        
        
        return redirect()->back();
    }

    public function draft($product_id){
        Product::where('product_id',$product_id)->update(["status"=>"Draft"]);
        
        return redirect()->back();
    }
    public function Active($product_id){
        Product::where('product_id',$product_id)->update(["status"=>"Active"]);
        
        return redirect()->back();
    }


}

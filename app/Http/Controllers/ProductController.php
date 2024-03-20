<?php
namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\Loggable;

class ProductController extends Controller
{
    use Loggable;

    public function store(Request $request)
    {
        // Your validation logic here

        // Save the product
        $productValidate=request()->validate([
            "name"=> "string||max:25",
        ]);
        $product = Product::create([
            "name"=> $productValidate["name"],
        ]);

        if($product){
            $this->logAction('Product created: ' . $product->name);

            
            return ApiResponseHelper::jsonResponse(200,'success',$product);
        }
        else{
            return ApiResponseHelper::jsonResponse(500,'error');
        }
       
       
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    public function index(){
        $product = Product::all();
        return view('adminhome', ['products'=>$product]);
    
    }

    public function productDetails($id){
        $product = Product::find($id);
        return view('ProductDetails', compact('product'));
    }

    public function show() {
    
        $products = Product::all();
        $categories = Product::distinct()->pluck('category')->toArray();
        $selectedCategory = request()->input('category'); // Retrieve selected category
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }
    
    public function showByCategory(Request $request)
    {
        $category = $request->input('category');
        $categories = Product::distinct()->pluck('category')->toArray();
    
        $products = Product::when($category, function ($query) use ($category) {
            return $query->where('category', $category);
        })->get();
    
        $selectedCategory = $category; // Pass the selected category to the view
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }


    public function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'category' => $data['category'],
        ]);
    }

    function addPost(Request $request){
        $request->validate([
            "name"=> "required",
            "price"=> "required",
            "description"=> "required",
            "category"=> "required"
            ]);

            $data['name'] = $request->name;
            $data['price'] = $request->price;
            $data['description'] = $request->description;
            $data['category'] = $request->category;
            Product::create($data);
            return redirect(route("admin.home"))->with("success","product added");

        }

        function add(){
            return view("admin_add");
        }

        public function adminHome(){
            return view('adminhome');
        }

        public function delete($id){
            $data = Product::find($id);
            $data->delete();
            return redirect(route('admin.home'));
        }

        public function edit($id){
            $products = Product::find($id);
            return view('admin_edit', ['product'=>$products]);
        }

        public function update(Request $request, $id){
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->category = $request->input('category');
            $product->update();
            return redirect(route('admin.home'))->with('Data updated successfully');

        }

}


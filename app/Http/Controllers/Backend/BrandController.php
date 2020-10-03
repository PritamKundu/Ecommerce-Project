<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Form validation
        $request->validate([
            'brand_name' => 'required|max:255',
        ],
        [
            'brand_name.required' => 'Please Insert a Brand Name',
        ]);

        //store in DB

        $brand = new Brand();

        $brand->name        = $request->brand_name;
        $brand->slug        = Str::slug($request->brand_name);
        $brand->description = $request->brand_description;
       
        if ( $request->image){
            $image         = $request->file('image');
            $img           = time(). '.' .$image->getClientOriginalExtension();
            $location      = public_path('images/brand/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }

           //var_dump($brand);
           $brand->save();
           return redirect()->route('managebrands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $brand = Brand::find($id);
        if(!is_null($brand))
        {
            return view('backend.pages.brand.edit', compact('brand'));
        }
        else{
            return route('managebrands');
        }
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'brand_name' => 'required|max:255',
        ],
        [
            'brand_name.required' => 'Please Insert a Brand Name',
        ]);

        //store in DB

        $brand = Brand::find($id);

        $brand->name        = $request->brand_name;
        $brand->slug        = Str::slug($request->brand_name);
        $brand->description = $request->brand_description;
        

        
        if( $request->image )
        {
        //Delet Existing Image
        if (File::exists('images/brand/' .$brand->image)) {
            File::delete('images/brand/' .$brand->image);
        }
        //Upload New Image
            $image         = $request->file('image');
            $img           = time(). '.' .$image->getClientOriginalExtension();
            $location      = public_path('images/brand/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }

           //var_dump($category);
           $brand->save();
           return redirect()->route('managebrands');    
       
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $brand = Brand::find($id);


        if ( !is_null($brand->id)) {
        //Delete parent category & Image
              if (File::exists('images/brand/' .$brand->image)) {
                 File::delete('images/brand/' .$brand->image);
              }
            
              $brand->delete();
            }

                return redirect()->route('managebrands');   
    }
}


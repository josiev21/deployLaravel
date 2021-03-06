<?php
  
namespace App\Http\Controllers;
use Ramsey\Uuid\Uuid;

use App\Pro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ListcolorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$products = Pro::where('source_type', 'App\Models\Task')->get();  
        return view('colors.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colors.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'external_id' => 'sometimes',
            'title' => 'required',
            'source_type' => 'required',
            'color' => 'required',
        ]);
  
        Pro::insert([
            'external_id' => Uuid::uuid4()->toString(),
            'title' => $request->title,
            'source_type' => $request->source_type,
            'color' => $request->color,

        ]);
   
        return redirect()->route('colors.index')
                        ->with('success','List created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $product = Pro::get();

        return view('colors.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Pro::findOrFail($id);

        return view('colors.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($product,Request $request )
    {
        // dd($product);
        //return $product;
        $request->validate([
            'title' => 'required',
            'source_type' => 'required',
            'color' => 'required',
        ]);
        Pro::findOrFail($product)->update($request->all());
  
        return redirect()->route('colors.index')
                        ->with('success','List updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Pro::where('id', '=', $id);
        $image = $query->first();
        $query->delete();
        return redirect()->route('colors.index')
                        ->with('success','List deleted successfully');
    }
}
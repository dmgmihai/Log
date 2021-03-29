<?php
  
namespace App\Http\Controllers;
   
use App\Models\CV;
use Illuminate\Http\Request;
  
class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = CV::latest()->paginate(5);
    
        return view('cvs.index',compact('cvs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvs.create');
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
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        CV::create($request->all());
     
        return redirect()->route('cvs.index')
                        ->with('success','CV created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(CV $cv)
    {
        return view('cvs.show',compact('cv'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(CV $cv)
    {
        return view('cvs.edit',compact('cv'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CV $cv)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $cv->update($request->all());
    
        return redirect()->route('cvs.index')
                        ->with('success','CV updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(CV $cv)
    {
        $cv->delete();
    
        return redirect()->route('cv.index')
                        ->with('success','CV deleted successfully');
    }
}
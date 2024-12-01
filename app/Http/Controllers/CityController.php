<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cities = City::paginate(10);
          
        return view('cities.index', compact('cities'));
                    
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cities.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CityStoreRequest $request): RedirectResponse
    {   
        City::create($request->validated());
           
        return redirect()->route('cities.index')
                         ->with('success', 'city created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(City $city): View
    {
        return view('cities.show',compact('city'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city): View
    {
        return view('cities.edit',compact('city'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(CityUpdateRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());
          
        return redirect()->route('cities.index')
                        ->with('success','city updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city): RedirectResponse
    {
        $city->delete();
           
        return redirect()->route('cities.index')
                        ->with('success','city deleted successfully');
    }
}

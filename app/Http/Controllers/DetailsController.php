<?php

namespace App\Http\Controllers;

use App\Models\UserCategories;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCategories = UserCategories::latest()->paginate(20);
        return view('details.index', compact('userCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userCategory = new UserCategories();
        return view('details.create', compact('userCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserCategories::$rules);

        $userCategory = UserCategories::create($request->all());

        return redirect()->route('details.index')
            ->with('success', 'UserCategories created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCategories $userCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UserCategories $userCategory)
    {
        return view('details.show', compact('userCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCategories $userCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCategories $userCategory)
    {
        return view('userCategories.edit', compact('userCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\UserCategories $userCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCategories $userCategory)
    {
        request()->validate($userCategory::$rules);

        $userCategory->update($request->all());

        return redirect()->route('details.index')
            ->with('success', 'UserCategories updated successfully');
    }

    /**
     * @param UserCategories $userCategory
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(UserCategories $userCategory)
    {
        $userCategory->delete();

        return redirect()->route('details.index')
            ->with('success', 'UserCategories deleted successfully');
    }
}

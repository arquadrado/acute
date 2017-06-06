<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Admin\Facades\AdminResourceManager as Manager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $redirectTo = '/admin';
    protected $guard = 'admin';
    protected $resource = null;

    public function __construct()
    {
        $this->middleware('admin');
        $this->resource = Manager::resolveResource(request()->path());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        if (Manager::resourceExists($this->resource)) {
            $className = Manager::getResourceClass($this->resource);

            $items = $className::get();

            return view("admin.{$this->resource}.index", ['items' => $items]);
        }

        return view('admin.errors.inexistent-model');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

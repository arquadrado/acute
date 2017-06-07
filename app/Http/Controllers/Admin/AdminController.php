<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Admin\Facades\AdminResourceManager as Manager;
use App\Support\Facades\CrudManager as Crook;
use Illuminate\Http\Request;
use Validator;

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

        $className = Manager::getResourceClass($this->resource);

        if (is_null($className)) {
            return view('admin.errors.inexistent-model');
        }

        $items = $className::get();

        return view("admin.{$this->resource}.index", [
            'resource' => $this->resource,
            'items' => $items
        ]);

        return view('admin.errors.inexistent-model');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        //$model = Manager::instantiateResource($this->resource);
        $className = Manager::getResourceClass($this->resource);

        $model = Crook::create($className);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        return view("admin.{$this->resource}.edit", [
            'resource' => $this->resource,
            'model' => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        $className = Manager::getResourceClass($this->resource);
        $model = Crook::create($className);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        $this->validate($request, $model->getRules());

        // extracts all the request fields excepting the csrf token
        $fields = array_except($request->all(), ['_token']);

        $model = Crook::update($model, $fields);
        $model = Crook::save($model);

        return redirect()->route("admin.{$this->resource}.edit", [str_singular($this->resource) => $model->id])->with(['message' => 'Cool']);
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

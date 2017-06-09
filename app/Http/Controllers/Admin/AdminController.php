<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Admin\Facades\AdminResourceManager as Manager;
use App\Models\Media;
use App\Models\BaseModel;
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

        /**
         * Resolves the current resource based on the current admin route
         */
        $this->resource = Manager::resolveResource(request()->path());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * If the controller fails to resolve the current resource the flow stops
         * and an 'unresolved-resource' error view is displayed
         */
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        /**
         * If the controller fails to resolve the current resource the flow stops
         * and an 'unresolved-resource' error view is displayed
         */
        $className = Manager::getResourceClass($this->resource);

        if (is_null($className)) {
            return view('admin.errors.inexistent-model');
        }

        $items = $className::get();

        return view(Manager::resolveResourceView($this->resource, 'index'), [
            'resource' => $this->resource,
            'items' => $items,
            'token' => csrf_token()
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

        $className = Manager::getResourceClass($this->resource);

        $model = Manager::instantiateResource($this->resource);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        return view(Manager::resolveResourceView($this->resource, 'edit'), [
            'resource' => $this->resource,
            'model' => $model,
            'action' => 'store',
            'token' => csrf_token()
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
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        $model = Manager::instantiateResource($this->resource);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        $this->validate($request, $model->getRules());

        $files = $this->prepareMedia($request);

        // extracts all the request fields excepting the csrf token
        $fields = $this->prepareFields($request, $model);

        $model->fill($fields)->save();
        $model->media()->saveMany($files);

        return redirect()
                ->route("admin.{$this->resource}.edit", [
                    str_singular($this->resource) => $model->id
                ])
                ->with('response', [
                    'status' => 0,
                    'message' => 'Resource saved!'
                ]);
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
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        $className = Manager::getResourceClass($this->resource);

        $model = $className::find($id);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        return view(Manager::resolveResourceView($this->resource, 'edit'), [
            'resource' => $this->resource,
            'model' => $model,
            'action' => 'update',
            'token' => csrf_token()
        ]);
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
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        $className = Manager::getResourceClass($this->resource);

        $model = $className::find($id);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        $this->validate($request, $model->getRules());

        $files = $this->prepareMedia($request);

        // extracts all the request fields excepting the csrf token
        $fields = $this->prepareFields($request, $model);

        $model->fill($fields)->save();
        $model->media()->saveMany($files);

        return redirect()
                ->route("admin.{$this->resource}.edit", [
                    str_singular($this->resource) => $model->id
                ])
                ->with('response', [
                    'status' => 0,
                    'message' => 'Resource updated!'
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->resource)) {
            return view('admin.errors.unresolved-resource');
        }

        $className = Manager::getResourceClass($this->resource);

        $model = $className::find($id);

        if (is_null($model)) {
            return view('admin.errors.inexistent-model');
        }

        $model->delete();
        $model->media()->delete();

        return redirect()
                ->route("admin.{$this->resource}.index")
                ->with('response', [
                    'status' => 0,
                    'message' => 'Resource deleted!'
                ]);
    }

    /**
     * Prepare media to save
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array $files
     */
    public function prepareMedia(Request $request)
    {
        $files = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $mimeType = $file->getMimeType();
                $path = $file->store('media/images', 'public');
                array_push($files, new Media([
                    'path' => $path,
                    'mime_type' => $mimeType
                ]));
            }
        }
        return $files;
    }

    /**
     * Prepare fields to save
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\BaseModel  $Model
     * @return array $fields
     */
    public function prepareFields(Request $request, BaseModel $model)
    {
        $fields = array_except($request->all(), ['_token', 'files', '_method']);
        foreach ($model->getColumns() as $column => $type) {
            if (!array_key_exists($column, $fields)) {
                $fields[$column] = 0;
            }
        }
        return $fields;
    }
}

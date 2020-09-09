<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    protected $request;
    private $repository;

    #injeçao de independencia
    public function __construct(Request $request, Curso $curso)
    {
        $this->request = $request;
        $this->repository = $curso;

         /*$this->middleware('auth');
        $this->middleware('auth')->only([
            'create', 'store'
            ]);
        $this->middleware('auth')->except([
            'index', 'show'
            ]);*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = $this->repository->latest()->paginate();

        return view('admin.pages.cursos.index', [
            'cursos' => $cursos,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCursoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCursoRequest $request)
    {
        
        $data  = $request->only('name');

        Curso::create($data);
         
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$curso = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.cursos.show', [
            'curso' => $curso
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$curso = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.cursos.edit', [
            'curso' => $curso
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCursoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCursoRequest $request, $id)
    {
        if (!$curso = $this->repository->find($id))
            return redirect()->back();
        
        $curso->update($request->all());
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$curso = $this->repository->find($id))
            return redirect()->back();
        
        $curso->delete();

        return redirect()->route('cursos.index');
    }

    public function search(Request $request){

        $filters = $request->all();

        $cursos = $this->repository->search($request->filter);

        return view('admin.pages.cursos.index', [
            'cursos' => $cursos,
            'filters' => $filters,
        ]);
    }
}

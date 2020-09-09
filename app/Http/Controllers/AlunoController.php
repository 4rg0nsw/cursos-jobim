<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    protected $request;
    private $repository;

    #injeçao de independencia
    public function __construct(Request $request, Aluno $aluno)
    {
        $this->request = $request;
        $this->repository = $aluno;

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
        $alunos = Aluno::latest()->paginate();

        return view('admin.pages.alunos.index', [
            'alunos' => $alunos,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateAlunoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateAlunoRequest $request)
    {
        $data  = $request->only('name', 'email', 'data', 'cursos');

        $this->repository->create($data);
         
        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$aluno = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.alunos.show', [
            'aluno' => $aluno
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
        if (!$aluno = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.alunos.edit', [
            'aluno' => $aluno
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
        if (!$aluno = $this->repository->find($id))
            return redirect()->back();
        
        $aluno->update($request->all());
        return redirect()->route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$aluno = $this->repository->find($id))
            return redirect()->back();
        
        $aluno->delete();

        return redirect()->route('alunos.index');
    }

    public function search(Request $request){

        $filters = $request->all();

        $alunos = $this->repository->search($request->filter);

        return view('admin.pages.alunos.index', [
            'alunos' => $alunos,
            'filters' => $filters,
        ]);
    }
}

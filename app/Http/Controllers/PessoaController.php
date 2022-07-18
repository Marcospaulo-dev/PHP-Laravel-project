<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

/**
 * Class PessoaController
 * @package App\Http\Controllers
 */
class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::paginate();

        return view('pessoa.index', compact('pessoas'))
            ->with('i', (request()->input('page', 1) - 1) * $pessoas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoa = new Pessoa();
        return view('pessoa.create', compact('pessoa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pessoa::$rules);

        $pessoa = Pessoa::create($request->all());

        return redirect()->route('pessoas.index')
            ->with('success', 'Pessoa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::find($id);

        return view('pessoa.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);

        return view('pessoa.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pessoa $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        request()->validate(Pessoa::$rules);

        $pessoa->update($request->all());

        return redirect()->route('pessoas.index')
            ->with('success', 'Pessoa updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id)->delete();

        return redirect()->route('pessoas.index')
            ->with('success', 'Pessoa deleted successfully');
    }
}

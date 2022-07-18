<?php

namespace App\Http\Controllers;

use App\Models\Pessoaendereco;
use Illuminate\Http\Request;

/**
 * Class PessoaenderecoController
 * @package App\Http\Controllers
 */
class PessoaenderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaenderecos = Pessoaendereco::paginate();

        return view('pessoaendereco.index', compact('pessoaenderecos'))
            ->with('i', (request()->input('page', 1) - 1) * $pessoaenderecos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoaendereco = new Pessoaendereco();
        return view('pessoaendereco.create', compact('pessoaendereco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pessoaendereco::$rules);

        $pessoaendereco = Pessoaendereco::create($request->all());

        return redirect()->route('pessoaenderecos.index')
            ->with('success', 'Pessoaendereco created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoaendereco = Pessoaendereco::find($id);

        return view('pessoaendereco.show', compact('pessoaendereco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoaendereco = Pessoaendereco::find($id);

        return view('pessoaendereco.edit', compact('pessoaendereco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pessoaendereco $pessoaendereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoaendereco $pessoaendereco)
    {
        request()->validate(Pessoaendereco::$rules);

        $pessoaendereco->update($request->all());

        return redirect()->route('pessoaenderecos.index')
            ->with('success', 'Pessoaendereco updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pessoaendereco = Pessoaendereco::find($id)->delete();

        return redirect()->route('pessoaenderecos.index')
            ->with('success', 'Pessoaendereco deleted successfully');
    }
}

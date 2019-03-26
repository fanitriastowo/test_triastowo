<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Armada;
use App\JenisArmada;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $armadas = Armada::all();
        return view('home', compact('armadas'));
    }

    public function create() {
        $jenisArmadas = JenisArmada::all();
        return view('input', compact('jenisArmadas'));
    }

    public function store(Request $request) {

        $armada = new Armada([
            'jenis_armada_id' => $request->get('jenis_armada_id'),
            'kode' => $request->get('kode')
        ]);

        $armada->save();
        return redirect('/home');
    }

    public function destroy($id) {
        $armada = Armada::find($id);
        $armada->delete();
        return redirect('/home');
    }
}

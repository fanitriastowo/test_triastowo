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
        $armadas = \DB::table('armadas as armada')
            ->join('jenis_armadas as jenis', 'armada.jenis_armada_id', '=', 'jenis.id')
            ->select('armada.id', 'armada.kode', 'jenis.nama', 'jenis.merk')
            ->get();
        // $armadas = Armada::all();
        return view('home', compact('armadas'));
    }

    public function create() {
        $jenisArmadas = JenisArmada::all();
        return view('input', compact('jenisArmadas'));
    }

    public function edit($id) {
        $armada = Armada::find($id);
        $jenisArmadas = JenisArmada::all();
        return view('edit', ['armada' => $armada, 'jenisArmadas' => $jenisArmadas]);
    }

    public function update(Request $request, $id) {
        $armada = Armada::find($id);
        $armada->jenis_armada_id = $request->get('jenis_armada_id');
        $armada->kode = $request->get('kode');
        $armada->save();

        return redirect('/home');
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

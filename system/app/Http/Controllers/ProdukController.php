<?php 

namespace App\Http\Controllers;
use App\Models\Produk;

class ProdukController extends Controller 
{
	function index(){
		$user = request()->user();
		$data['list_produk'] = $user->produk;
		return view('produk.index', $data);
	}

	function create(){
		return view('produk.create');
	}

	function store(){
		$produk = new Produk;
		$produk->id_user = request()->user()->id;
		$produk->nama= request('nama');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->deskripsi = request('deskripsi');
		$produk->stok = request('stok');
		$produk->save();

		return redirect('admin/produk')->with('success','Data Berhasil Ditambahkan');
		// dd(request()->all());
	}

	function show(Produk $produk){
		$data['produk'] = $produk;
		return view('produk.show', $data);
	}

	function edit(Produk $produk){
		$data['produk'] = $produk;
		return view('produk.edit', $data);
	}

	function update(Produk $produk){
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->deskripsi = request('deskripsi');
		$produk->stok = request('stok');
		$produk->save();

		return redirect('admin/produk')->with('success','Data Berhasil Diedit');
	}

	function destroy(Produk $produk){
		$produk->delete();
		return redirect('admin/produk')->with('success','Data Berhasil Dihapus');
	}

	function filter(){
		$nama = request('nama');
		$stok = explode(",", request('stok'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');

		//Where, WhereIn, WhereBetween
		//$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
		//$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();

		//WhereNot, WhereNotIn, WhereNotBetween
		//$data['list_produk'] = Produk::where('stok', '<>', "$stok")->get();
		//$data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();

		//WhereNull, WherenotNull, WhereNotNull
		//$data['list_produk'] = Produk::whereNull('stok')->get();
		//$data['list_produk'] = Produk::whereNotNull('stok')->get();
		//$data['list_produk'] = Produk::whereNotNull('harga')->get();

		//WhereDate, WhereMonth, WhereDay, WhereYear, WhereTime
		//$data['list_produk'] = Produk::whereDate('create_at', '2021-01-04')->get();
		//$data['list_produk'] = Produk::whereMonth('create_at', '01')->whereYear('created_at', '2021')->get();
		//$data['list_produk'] = Produk::whereDay('create_at' 'month')->get();
		//$data['list_produk'] = Produk::whereYear('create_at', '2021')->get();
		//$data['list_produk'] = Produk::whereTime('create_at', '14:20:58')->get();

		//WhereGroup
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotIn('stok', [20])->whereYear('create_at', '2021')->get();

		$data['nama'] = $nama;
		$data['stok'] = request('stok');

		return view('produk.index', $data);
	}
}

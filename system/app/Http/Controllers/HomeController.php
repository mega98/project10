<?php 

namespace App\Http\Controllers;

class HomeController extends Controller{


	function showdashboard(){
		return view('dashboard');
	}

	function showproduk(){
		return view('produk');
	}

	function showkategori(){
		return view('kategori');
	}

	function showhome(){
		return view('home');
	}

	function showproduk1(){
		return view('produk1');
	}

	function showcheckout(){
		return view('checkout');
	}

	function showabout(){
		return view('about');
	}

	function showblog(){
		return view('blog');
	}

	function showcontact(){
		return view('contact');
	}

	function test($produk, $hargaMin = 0, $hargaMax = 0){
		if($produk == 'payung'){
			echo "Tampilkan Produk Payung";
		}elseif($produk == 'sepeda'){
			echo "Produk Sepeda";
		}
		echo "<br>";
		echo "Harga Min adalah $hargaMin <br>";
		echo "Harga Max adalah $hargaMax <br>";
	}
}
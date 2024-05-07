<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $barangs = DB::table('barangs')->where('kuantitas', '>' , 0)->orderBy('terjual', 'desc')->Limit(3)->get();
        $barangs = Barang::with(['kategori'])->where('kuantitas', '>' , 0)->orderByRaw("CAST(terjual as UNSIGNED) DESC")->Limit(3)->get();
        $kategoris = DB::table('kategoris')->get();
        // die(print_r($barangs));

        // return view('tampilantoko.home.home',compact('barangs','kategoris'));
        return view('tampilantoko.home.home', [
            'barangs' => $barangs,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }



    public function hierarchicalClustering()
    {

        $kategoris = DB::table('kategoris')->get();


        // Ambil semua data yang akan di-cluster
        $dataPoints = Barang::all();

        // Inisialisasi masing-masing data sebagai cluster awal
        $clusters = [];
        foreach ($dataPoints as $dataPoint) {
            $clusters[] = [$dataPoint];
        }

        // Mulai proses Hierarchical Clustering
        while (count($clusters) > 1) {
            // Hitung jarak antara setiap pasangan cluster
            $closestClusters = $this->findClosestClusters($clusters);

            // Gabungkan dua cluster terdekat menjadi satu cluster baru
            list($cluster1Index, $cluster2Index) = $closestClusters;
            $newCluster = array_merge($clusters[$cluster1Index], $clusters[$cluster2Index]);
            unset($clusters[$cluster1Index], $clusters[$cluster2Index]);
            $clusters[] = $newCluster;
        }

        // Hasilnya adalah satu cluster tunggal yang berisi semua data
        return view('tampilantoko.home.home',[
            'barangs' => $clusters[0],
            'kategoris' => $kategoris
        ]);
    }

    // Fungsi untuk mencari dua cluster terdekat
    private function findClosestClusters($clusters)
    {
        $minDistance = INF;
        $closestClusters = [0, 1];

        // Hitung jarak antara setiap pasangan cluster
        for ($i = 0; $i < count($clusters); $i++) {
            for ($j = $i + 1; $j < count($clusters); $j++) {
                $distance = $this->calculateDistance($clusters[$i], $clusters[$j]);
                if ($distance < $minDistance) {
                    $minDistance = $distance;
                    $closestClusters = [$i, $j];
                }
            }
        }

        return $closestClusters;
    }

    // Fungsi untuk menghitung jarak antara dua cluster menggunakan single linkage
    private function calculateDistance($cluster1, $cluster2)
    {
        $minDistance = INF;

        foreach ($cluster1 as $point1) {
            foreach ($cluster2 as $point2) {
                $distance = $this->distanceFunction($point1, $point2); // Implementasikan fungsi jarak sesuai kebutuhan Anda
                if ($distance < $minDistance) {
                    $minDistance = $distance;
                }
            }
        }

        return $minDistance;
    }
}

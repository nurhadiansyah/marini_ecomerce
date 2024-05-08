<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        $users = User::where('level', 0)->count();
        $transaksis = Transaksi::get();
        // $barang_laris = Barang::orderBy('terjual', 'desc')->get();
        $barang_laris = DB::table('barangs')->orderByRaw("CAST(terjual as UNSIGNED) DESC")->limit(10)->get();
        // $barang_laris = Barang::orderBy(CAST('terjual', 'AS', 'UNSIGNED'), 'terjual')->get();

        // CAST(terjual AS UNSIGNED) DESC, terjual
        // die(print_r($transaksis[0]->barang->nama_barang));
        return view('admin1.dashboard.dashboard',[
            'barangs' => $barangs,
            'users' => $users,
            'transaksis' => $transaksis,
            'barang_laris' => $barang_laris,
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }


    public function hierarchicalClustering()
    {
        $users = User::where('level', 0)->count();
        $transaksis = Transaksi::get();


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
        return view('admin1.dashboard.dashboard',[
            'barangs' => $clusters[0],
            'users' => $users,
            'transaksis' => $transaksis,
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

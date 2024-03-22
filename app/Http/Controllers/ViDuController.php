<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViDuController extends Controller{
    function vidu1(){
    return view('vidu1');
    }
    function vidu2(){
    return view('vidu2');
        }
    function tinhtong(Request $request){
        $so_a = $request->input("so_a");
        $so_b = $request->input("so_b");
        $ket_qua = $so_a+$so_b;
        return "Kết quả là: ".$ket_qua;
        }
    
        #bài 1
    function bai1(){
        return view('bai1.form');
    }

    function in_hoa(Request $request){
        $nhapchuoi = $request->input("nhapchuoi");
        $chuoihoa = mb_strtoupper($nhapchuoi);
        return view("bai1.ketqua", compact('chuoihoa'));
    }

    #bài 2
    function bai2(){
        return view('bai2.form');
    }
    function timMinMax(Request $request)
    {
        $dayso = $request->input('number');
        $mang = explode(',', $dayso);
        $solonnhat = max($mang);
        $sonhonhat = min($mang);
        return view("bai2.ketqua", compact('sonhonhat', 'solonnhat'));
}

    #bài 3
    function bai3(){
        return view('bai3.form');
    }
    function color(Request $request)
    {
        $dayso = $request->input('number');
        $mang = explode(',', $dayso);
        return view("bai3.ketqua", compact('mang'));
}
    #bài 4
    function bai4(){
        return view('bai4.form');
    }
    function info(Request $request){
        $danhsach = $request->input('dulieusv');
        $mang_sv = explode(';', $danhsach);
        $sinhvien = [];
        foreach ($mang_sv as $sv) {
            list($maSV, $hoTenSV) = explode('_', $sv, 2);
            $sinhvien[] = [
                'maSV' => $maSV,
                'hoTenSV' => $hoTenSV,
            ];
        }
        return view("bai4.ketqua", compact('sinhvien'));
    }

    #test git
    function chucnang(){
        return view('bai3.form');
    }

}

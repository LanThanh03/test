<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
class BookController extends Controller{
    function laythongtintheloai(){
        $the_loai_sach = DB::table("dm_the_loai")->get();
        return view("ql_sach.theloai",compact("the_loai_sach"));
        }
    function laythongtinsach(){
        $sach = DB::table("sach")->select("tieu_de","tac_gia") -> where("nha_xuat_ban","Văn Học")->get();
        return view("ql_sach.thongtinsach",compact("sach"));
        }
    function biamem(){
        $bookinfo = DB::table("sach")->select("tieu_de", "nha_xuat_ban", "tac_gia", "hinh_thuc_bia", 
        "mo_ta", "gia_ban") -> where ("hinh_thuc_bia", "Bìa mềm") -> orderby("gia_ban", "asc") -> get();
        return view("ql_sach.biamem",compact("bookinfo"));
    }
    function thongke(){
        $count = DB::table("sach")
            ->select('dm_the_loai.ten_the_loai', DB::raw('count(*) as so_luong'))
            ->join('dm_the_loai', 'sach.the_loai', '=', 'dm_the_loai.id')->groupBy('dm_the_loai.ten_the_loai')->get();
        return view("ql_sach.thongke", compact("count"));
    }
}

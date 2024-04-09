<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
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
    function qlsach(){
        $data = DB::table("sach")->get();
        return view("vidusach.book_list",compact("data"));
    }
    function bookadd(){
        return view("vidusach.book_add_form");
    }
    function savebookinfo(Request $request){
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:255'],
            'nha_cung_cap' => ['required', 'string', 'max:255'],
            'nha_xuat_ban' => ['required', 'string', 'max:255'],
            'tac_gia' => ['required', 'string', 'max:255'],
            'hinh_thuc_bia' => ['required', 'string', 'max:255'],
            'mo_ta' => ['required', 'string', 'max:255'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'numeric'],
            'file_anh_bia' => ['required','image']
                ]); 
        // Xử lý tệp ảnh
            if ($request->hasFile('file_anh_bia')) {
            // Lưu tệp ảnh vào thư mục 'public/images'
            $image = $request->file('file_anh_bia');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Lưu ảnh vào thư mục storage

            // Lưu đường dẫn của ảnh vào cơ sở dữ liệu
            $data = $request->except("_token");
            $data['file_anh_bia'] = 'images/' . $imageName;
            DB::table("sach")->insert($data);

            return redirect()->route('bookadd')->with('status', 'Thêm thành công');
        } else {
            // Nếu không có tệp ảnh được tải lên, hiển thị thông báo lỗi
            return redirect()->back()->withInput()->withErrors(['photo' => 'Bạn cần phải tải lên một ảnh.']);
        }
    }
    function bookedit($id){
        $book = Book::find($id); // Lấy thông tin của cuốn sách dựa trên ID
        if(!$book) {
            return redirect()->back()->with('error', 'Không tìm thấy sách với ID ' . $id); // Xử lý trường hợp không tìm thấy sách
        }
        return view("vidusach.book_edit_form", ['book' => $book]); // Trả về view với thông tin sách
    }
    function saveeditbook(Request $request) {
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:255'],
            'nha_cung_cap' => ['required', 'string', 'max:255'],
            'nha_xuat_ban' => ['required', 'string', 'max:255'],
            'tac_gia' => ['required', 'string', 'max:255'],
            'hinh_thuc_bia' => ['required', 'string', 'max:255'],
            'mo_ta' => ['required', 'string', 'max:10000'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'numeric'],
            'file_anh_bia' => ['nullable', 'image']
        ]);
    
        // Lưu thông tin sách vào database
        $book = Book::find($request->id);
        $book->tieu_de = $request->tieu_de;
        $book->nha_cung_cap = $request->nha_cung_cap;
        $book->nha_xuat_ban = $request->nha_xuat_ban;
        $book->tac_gia = $request->tac_gia;
        $book->hinh_thuc_bia = $request->hinh_thuc_bia;
        $book->mo_ta = $request->mo_ta;
        $book->gia_ban = $request->gia_ban;
        $book->the_loai = $request->the_loai;
    
        // Xử lý file ảnh nếu được cung cấp
        if ($request->hasFile('file_anh_bia')) {
            $image = $request->file('file_anh_bia');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Lưu ảnh vào thư mục storage
    
            // Cập nhật đường dẫn ảnh mới vào cơ sở dữ liệu
            $book->file_anh_bia = 'images/' . $imageName;
        }
    
        $book->save();
    
        return redirect()->route('bookedit', ['id' => $book->id])->with('status', 'Cập nhật thành công');
    }
    
    
}

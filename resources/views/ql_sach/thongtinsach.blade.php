<html>
<head>
</head>
<body>
@foreach($bookinfo as $row)
Tiêu đề: {{$row->tieu_de}},Nhà xuất bản: {{$row->nha_xuat_ban}}, Tác giả: {{$row->tac_gia}},
Hình thức bìa: {{$row->hinh_thuc_bia}}, Mô tả: {{$row->mo_ta}}, Giá bán: {{$row->gia_ban}}<br>
@endforeach
</body>
</html>

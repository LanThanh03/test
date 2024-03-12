<html>
<head>
</head>
<body>
@foreach($bookinfo as $row)
Tiêu đề: {{$row->tieu_de}} <br>Nhà xuất bản: {{$row->nha_xuat_ban}}<br> Tác giả: {{$row->tac_gia}}<br>
Hình thức bìa: {{$row->hinh_thuc_bia}}<br> Mô tả: {{$row->mo_ta}}<br> Giá bán: {{$row->gia_ban}}<br><br>
@endforeach
</body>
</html>

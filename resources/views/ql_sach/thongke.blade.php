<html>
<head>
</head>
<body>
@foreach($count as $row)
Tên thể loại: {{$row->ten_the_loai}}
Số lượng: {{$row->so_luong}} <br>
@endforeach
</body>
</html>

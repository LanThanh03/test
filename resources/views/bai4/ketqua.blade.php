<h2>Danh sách sinh viên</h2>
<table border=1>
    <tr>
        <th>Mã sinh viên</th>
        <th>Họ tên</th>
    </tr>
    @foreach ($sinhvien as $sv)
        <tr>
            <td>{{ $sv['maSV'] }}</td>
            <td>{{ $sv['hoTenSV'] }}</td>
        </tr>
    @endforeach
</table>
 
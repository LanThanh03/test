<form action="{{url('in_hoa')}}" method = "post">
Nhập vào ký tự: <input type='text' name='nhapchuoi'><br>
<input type='submit' value='Chữ hoa: '>
{{ csrf_field() }}
</form>
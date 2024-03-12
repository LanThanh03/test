<form action="{{url('info')}}" method = "post">
        Nhập MSSV_HoVaTen <input type="text" name="dulieusv">
        <input type='submit' value='Xuất'>
        {{ csrf_field() }}
</form>
<form action="{{url('color')}}" method = "post">
        Dãy số nguyên <input type="text" name="number">
        <input type='submit' value='Đổi màu'>
        {{ csrf_field() }}
</form>
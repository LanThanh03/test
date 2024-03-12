<form action="{{url('timMinMax')}}" method = "post">
        Dãy số nguyên <input type="text" name="number">
        <input type='submit' value='tìm min max'>
        {{ csrf_field() }}
</form>
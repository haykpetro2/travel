<form id="tour-form">
    @csrf
    <table class="table table-striped table-bordered sourced-data">
        <thead>
        <tr>
            <th>Hotel Name</th>
            @for($i=1;$i<=$data['column'];$i++)
                <th>
                    <input type="text" placeholder="Enter Man Count" class="form-control">
                </th>
            @endfor
        </tr>
        </thead>
        <tbody>
        @for($r=1;$r<=$data['row'];$r++)
            <tr data-id="{{$r}}">
                <td>
                    <select  class="form-control choose-hotel">
                        <option value="">-</option>
                        @foreach($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->name_ru}}</option>
                        @endforeach
                    </select>
                </td>
                @for($c=1;$c<=$data['column'];$c++)
                    <td><input type="number" class="form-control"></td>
                @endfor
            </tr>
        @endfor
        </tbody>
    </table>
    <button type="button" class="btn btn-danger js-confirm_tours">Confirm</button>
</form>

<div class="flex sm:flex-row flex-col ">
    @foreach ($attrs as $attr)
        <div class="w-full" style="margin-right: 10px">
            <label for="ctnFile">{{$attr->name}}</label>
            <select class="selectize" name="terms[]" multiple='multiple'>
                @foreach ($attr->terms as $term)
                    <option value="{{$term->id}}">{{$term->name}}</option>
                @endforeach
            </select>
        </div>
    @endforeach
</div>

<div class="form-group">
    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
        <!-- Add options dynamically based on the selected district -->
        <option value="karnali">Karnali</option>
        <option value="Jawlakhel">Jawlakhel</option>
        <!-- Add more cities as needed -->
    </select>
</div>

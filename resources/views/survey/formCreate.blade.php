<div class="form-group">
    <label class="form-control-label">{{ __('School') }}</label>
    <div class="input-group input-group-merge">
        <select id="sekolah" class="form-control" name="sekolah" required>
            <option selected disabled>Select School</option>
            @foreach ($school as $s)
                <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>
    @error('sekolah')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{ __('Survey By') }}</label>
    <div class="input-group input-group-merge">
        <select id="by" class="form-control" name="by" required>
            <option selected disabled>Select User</option>
            @foreach ($users as $s)
                <option value="{{ $s->id }}">{{ $s->fullname }}</option>
            @endforeach
        </select>
    </div>
    @error('by')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
@php
    // $options = ['yes', 'no'];
    $options = [
        (object) [
            'value' => $bobot1->nilai,
            'name' => $bobot1->jawaban,
        ],
        (object) [
            'value' => $bobot2->nilai,
            'name' => $bobot2->jawaban,
        ],
        (object) [
            'value' => $bobot3->nilai,
            'name' => $bobot3->jawaban,
        ],
        (object) [
            'value' => $bobot4->nilai,
            'name' => $bobot4->jawaban,
        ],
    ];
    $temp_key = [];
@endphp
{{-- @foreach ($pertanyaan as $key => $p)
@php
    array_push($temp_key, $key);
@endphp
<div class="form-group">
    <label class="form-control-label soal">{{ $p->nama }}</label>
    @foreach ($options as $option)
        <div class="custom-control custom-radio mb-3">
            <input name="answer[{{$key}}]" class="custom-control-input" id="{{$option}}-{{$key}}" type="radio" value="{{ $option }}">
            <label class="custom-control-label" for="{{$option}}-{{$key}}">{{ $option }}</label>
        </div>
    @endforeach
</div>
@endforeach --}}

{{-- @php
    $count = 0;
@endphp --}}

{{-- @foreach ($pertanyaan as $p)
    <div class="section" id="section-{{ $loop->iteration }}"> --}}
{{-- @php
            $key_kat += 1;
        @endphp --}}
@foreach ($pertanyaan as $p)
    <div class="form-group">
        <label class="form-control-label soal-{{ $p->id }}">{{ $loop->iteration }}. {{ $p->nama }}
            ?</label>
        <div class="row">

            @foreach ($options as $option)
                <div class="custom-control custom-radio mb-3">
                    <div class="col-12">
                        <input name="answer[{{ $p->id }}]" class="custom-control-input"
                            id="{{ $option->value }}-{{ $p->id }}" type="radio"
                            value="{{ $option->value }}" required>
                        <label class="custom-control-label"
                            for="{{ $option->value }}-{{ $p->id }}">{{ $option->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
        @error('answer')
            <small class="text-danger" role="alert">
                {{ $message }}
            </small>
        @enderror
    </div>
@endforeach
{{-- </div>
@endforeach --}}

<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>

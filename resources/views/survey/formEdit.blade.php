<div class="form-group">
    <label class="form-control-label">{{ __('Survey By') }}</label>
    <div class="input-group input-group-merge">
        <select id="by" class="form-control" name="by" required>
            <option value="{{ $survey->by }}" selected>{{ $survey->users->fullname }}</option>
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

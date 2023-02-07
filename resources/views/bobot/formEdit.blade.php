<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Jawaban') }}</label>
            <h6 class="text-primary">{{ __('Nama Jawaban') }}</h6>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $bobots->jawaban }}" class="form-control" name="jawaban"
                    required>
                @error('jawaban')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Nilai Jawaban') }}</label>
            <h6 class="text-primary">{{ __('max value 10') }}</h6>
            <div class="input-group input-group-merge">
                <input type="number" value="{{ $bobots->nilai }}" max="10" class="form-control"
                    name="nilai" required>
                @error('nilai')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Batasan') }}</label>
            <h6 class="text-primary">{{ __('Kurang dari sama dengan nilai yang di inputkan dan max valuenya sekarang '.$max) }}</h6>
            <div class="input-group input-group-merge">
                <input type="number" value="{{ $bobots->batasan }}" max={{ $max }} class="form-control"
                    name="batasan" required>
                @error('batasan')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Output') }}</label>
            <h6 class="text-primary">{{ __('Hasil Survey') }}</h6>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $bobots->hasil }}" class="form-control"
                    name="hasil" required>
                @error('hasil')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<a href="{{ route('bobots.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>

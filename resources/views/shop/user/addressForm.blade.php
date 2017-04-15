<div class="col-xs-10">
    <form method="POST" action="{{ $action }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="first_name" class="col-md-4 control-label">Имя</label>
            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control" name="first_name"
                       value="{{ isset($profile) ? $profile->first_name : old('first_name') }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('first_name')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="userEmail" class="col-md-4 control-label">email</label>
            <div class="col-md-6">
                <input id="userEmail" type="text" class="form-control" name="userEmail"
                       value="{{ $userEmail }}" disabled>
            </div>
        </div>


{{--
        <div class="form-group">
            <label for="image" class="col-xs-4 control-label">Фото</label>
            <div class="col-md-6">
                <input id="image" type="file" name="image_field" value="">
            </div>
        </div>
--}}

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </div>
    </form>
</div>

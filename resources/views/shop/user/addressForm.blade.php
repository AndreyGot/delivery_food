<div class="col-xs-10">
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div>
            <input id="id" type="hidden" class="form-control" name="id"
                       value="{{ $userAddress->id }}">
        </div>

        <div class="form-group">
            <label for="region" class="col-md-4 control-label">region</label>
            <div class="col-md-6">
                <input id="region" type="text" class="form-control" name="region"
                       value="{{ $userAddress->region }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('region')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="city" class="col-md-4 control-label">city</label>
            <div class="col-md-6">
                <input id="city" type="text" class="form-control" name="city"
                       value="{{ $userAddress->city }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('city')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="street" class="col-md-4 control-label">street</label>
            <div class="col-md-6">
                <input id="street" type="text" class="form-control" name="street"
                       value="{{ $userAddress->street }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('street')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="house" class="col-md-4 control-label">house</label>
            <div class="col-md-6">
                <input id="house" type="text" class="form-control" name="house"
                       value="{{ $userAddress->house }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('house')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="flat" class="col-md-4 control-label">flat</label>
            <div class="col-md-6">
                <input id="flat" type="text" class="form-control" name="flat"
                       value="{{ $userAddress->flat }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('flat')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-md-4 control-label">Доп информация: (description)</label>
            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description"
                       value="{{ $userAddress->description }}">
                @if(count($errors) && !empty($nameErrors = $errors->get('description')))
                    <div class="alert alert-danger">
                        @foreach($nameErrors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </div>
    </form>
</div>

<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="control-label col-sm-3" for="name">Name: </label>
    <div class="col-sm-6">
        <input type="text" id="name" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group has-feedback {{ $errors->has('login') ? 'has-error' : '' }}">
    <label class="control-label col-sm-3" for="login">Login: </label>
    <div class="col-sm-6">
        <input type="text" id="login" name="login" class="form-control" value="{{ old('login') }}" placeholder="exemplo123">
        @if ($errors->has('login'))
        <span class="help-block">
            <strong>{{ $errors->first('login') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
    <label class="control-label col-sm-3" for="email">Email: </label>
    <div class="col-sm-6">
        <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="exemplo@teste.com">
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group has-feedback {{ $errors->has('type') ? 'has-error' : '' }}">
        <label class="control-label col-sm-3" for="type">Type:</label>
        <div class="col-sm-6">
            <select class="form-control" name="type" id="type">
                <option value="0">Select type</option>
                <option value="1">Administrador</option>
                <option value="2">Comum</option>
            </select>
            @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
            @endif  
        </div>
    </div>

<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
    <label class="control-label col-sm-3" for="password">Password: </label>
    <div class="col-sm-6">
        <input type="password" id="password" name="password" class="form-control" placeholder="******">
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    <label class="control-label col-sm-3" for="confirmPassword">Confirm Password:</label>
    <div class="col-sm-6">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="******">
        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="center-block">
    <button type="submit" class="btn btn-success col-md-offset-4">Create user</button>
    <button type="submit" class="btn btn-danger col-md-offset-1">Cancel</button>
</div>
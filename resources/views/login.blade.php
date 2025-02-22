@extends ("layout")
@section ("content")
	<form method="POST" action="{{ route('login') }}">
		@csrf
		<div>
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
		</div>
		<div>
			@error('email')
				<strong>{{ $message }}</strong>
			@enderror
		</div>
		<div>
			<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
		</div>
		<div>
			@error('password')
				<strong>{{ $message }}</strong>
			@enderror
		<div>
			<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
			<label class="form-check-label" for="remember">
				{{ __('Remember Me') }}
			</label>
		</div>
		<div>
			<button type="submit" class="pointer">
				{{ __('Login') }}
			</button>
		</div>
		@if (Route::has('password.request'))
			<div>
				<a class="btn btn-link" href="{{ route('password.request') }}">
					{{ __('Forgot Your Password?') }}
				</a>
			</div>
		@endif
	</form>
@endsection

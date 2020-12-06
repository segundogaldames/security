@if(session()->get('success'))
	<p class="alert alert-success">{{ session('success') }}</p>
@endif
@if(session()->get('danger'))
	<p class="alert alert-danger">{{ session('danger') }}</p>
@endif
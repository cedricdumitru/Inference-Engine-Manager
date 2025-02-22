@extends ("layout")
@section ("content")
	<section id="dashboard tableApp" class="">
		<h1 class="textcenter uppercase">{{ $title }}</h1>
		<div class="container flex row wrap xSpaceBetween ySpaceBetween">
			@if (isset($navigation) && !empty($navigation) && !!$navigation)
				@component('navViewer', ["title" => $title, "url" => $node, "foldable" => false])
					<strong>Whoops!</strong> Une erreur s'est produite !
				@endcomponent
			@endif
			@component('arrayViewer', ["title" => $title, "url" => $node, "foldable" => false])
				<strong>Whoops!</strong> Une erreur s'est produite !
			@endcomponent
		</div>
	</section>
@endsection

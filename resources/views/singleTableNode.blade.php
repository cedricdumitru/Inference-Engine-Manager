@extends ("layout")
@section ("content")
	<section id="dashboard tableApp" class="">
		@if (isset($navigation) && !empty($navigation) && !!$navigation)
			@component('navViewer', ["title" => $title, "url" => $node, "foldable" => false])
				<strong>Whoops!</strong> Une erreur s'est produite !
			@endcomponent
		@endif
		@component('arrayViewer', ["title" => $title, "url" => $node, "foldable" => false])
			<strong>Whoops!</strong> Une erreur s'est produite !
		@endcomponent
	</section>
@endsection

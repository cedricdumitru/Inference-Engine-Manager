@extends ("layout")
@section ("content")
	<section id="dashboard" class="">
		@component('arrayViewer', ["title" => $title, "url" => $node])
			<strong>Whoops!</strong> Une erreur s'est produite !
		@endcomponent
	</section>
@endsection
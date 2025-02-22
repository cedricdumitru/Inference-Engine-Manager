@extends ("layout")
@section ("content")
	<section id="dashboard" class="">
		@component('arrayViewer', ["title" => "Unités", "header" => ["Libellé"], 'data' => [["bonjour", "test"], ["un", "DEIx"], ["deux", "zerfr"]]])
			<strong>Whoops!</strong> Une erreur s'est produite !
		@endcomponent
	</section>
@endsection
@extends ("layout")
@section ("content")
	<section id="dashboard" class="">
		<h1 class="textcenter uppercase">Tableau de bord</h1>
		<div class="textcenter bold">Bienvenue {{$name}}</div>
		<ul id="listActions" class="flex row wrap xSpaceAround yCenter">
			<li class="block"><a href="/devis" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Devis</a></li>
			<li class="block"><a href="/gestion" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Insertion données</a></li>
			<li class="block"><a href="/parametres" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Paramètres</a></li>
		</ul>
	</section>
@endsection
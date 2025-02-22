@extends ("layout")
@section ("content")
	<section id="dashboard" class="">
		<h1 class="textcenter uppercase">Gestion</h1>
		<ul id="listActions" class="flex row wrap xSpaceAround yCenter">
			<li class="block"><a href="/devis" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Produits</a></li>
			<li class="block"><a href="/gestion" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Inférences</a></li>
			<li class="block"><a href="/parametres" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Collections</a></li>
			<li class="block"><a href="/parametres" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Tarifs</a></li>
			<li class="block"><a href="/parametres" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Fournisseurs</a></li>
			<li class="block"><a href="/parametres" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Clients</a></li>
			<li class="block"><a href="/parametres" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Taux TVA</a></li>
		</ul>
	</section>
@endsection
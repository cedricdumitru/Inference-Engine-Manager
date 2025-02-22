@extends ("layout")
@section ("content")
	<section id="dashboard" class="">
		<h1 class="textcenter uppercase">Insertion de données</h1>
		<ul id="listActions" class="flex row wrap yCenter borderBottom margincenter">
			<li class="block"><a href="/gestion/produits" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Produits</a></li>
			<li class="block"><a href="/gestion/selections" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Processus de sélection</a></li>
		</ul>
		<ul id="listActions" class="flex row wrap yCenter borderBottom margincenter">
			<li class="block"><a href="/gestion/collections" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Collections</a></li>
			<li class="block"><a href="/gestion/tarifs" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Tarifs</a></li>
			<li class="block"><a href="/gestion/fournisseurs" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Fournisseurs</a></li>
			<li class="block"><a href="/gestion/clients" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Clients</a></li>
		</ul>
		<ul id="listActions" class="flex row wrap yCenter borderBottom margincenter">
			<li class="block"><a href="/gestion/divers" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Paramètres divers</a></li>
			<li class="block"><a href="/gestion/tva" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Taux de TVA</a></li>
		</ul>
	</section>
@endsection

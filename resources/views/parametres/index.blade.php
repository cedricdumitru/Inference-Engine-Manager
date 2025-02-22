@extends ("layout")
@section ("content")
	<section id="dashboard" class="">
		<h1 class="textcenter uppercase">Paramètres</h1>
		<ul id="listActions" class="flex row wrap yCenter borderBottom margincenter">
			<li class="block"><a href="/parametres/unites" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Unités</a></li>
			<li class="block"><a href="/parametres/variables" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Variables</a></li>
			<li class="block"><a href="/parametres/garanties" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Types de garanties</a></li>
			<li class="block"><a href="/parametres/reglements" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Modes de règlement</a></li>
			<li class="block"><a href="/parametres/clients" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Origines des clients</a></li>
			<li class="block"><a href="/parametres/devis" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Status des devis</a></li>
		</ul>
		<ul id="listActions" class="flex row wrap yCenter borderBottom margincenter">
			<li class="block"><a href="/parametres/utilisateurs" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Profils utilisateurs</a></li>
			<li class="block"><a href="/parametres/fonctions" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Fonctions personnes</a></li>
			<li class="block"><a href="/parametres/civilites" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Civilités</a></li>
			<li class="block"><a href="/parametres/pays" class="flex column nowrap xCenter ySpaceAround"><img class="actionIcon" src="https://via.placeholder.com/150" alt="Action icon"/>Pays</a></li>
		</ul>
	</section>
@endsection

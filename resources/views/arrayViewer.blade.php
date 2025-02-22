<h1 class="textcenter uppercase">{{ $title }}</h1>
<table class="tableApp sortable margincenter">
	<thead>
		<tr>
			@foreach($header as $value)
				<th scope="col">{{ $value }}</th><br/>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@if (gettype($data[0]) === "string")
			@foreach($data as $value)
				<tr>
					<td>{{ $value }}</td>
				</tr>
			@endforeach
		@elseif (gettype($data[0]) === "array")
			@foreach($data as $value)
				<tr>
				@foreach($value as $recValue)
					<td>{{ $recValue }}</td>
				@endforeach
				</tr>
			@endforeach
		@endif
		<tr>
			<td>Unité</td>
		</tr>
		<tr>
			<td>Mètre Linéaire</td>
		</tr>
		<tr>
			<td>M2</td>
		</tr>
		<tr>
			<td>Largeur</td>
		</tr>
		<tr>
			<td>Forfait</td>
		</tr>
		<tr>
			<td>Avancée</td>
		</tr>
		<tr>
			<td>% Prix produit</td>
		</tr>
	</tbody>
</table>
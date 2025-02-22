<h1 class="textcenter uppercase">{{ $title }}</h1>
<table class="tableApp sortable margincenter">
	<thead>
		<tr class="controls">
			<td><div class="relative"><i class="mdi mdi-close absolute pointer"></i></div></td>
			<td><div class="relative"><i class="mdi mdi-check absolute pointer"></i></div></td>
		</tr>
		<tr class="header"></tr>
	</thead>
	<tbody></tbody>
</table>
<script>
	(function()
	{
		$.ajax(
		{
			url: "/api/parametres/{{ $url }}",
			context: document.body,
			type: "GET",
			dataType: "json"
		}).done(function(data)
		{
			new tableApp(data, $("table.tableApp"));
		});
	})();
</script>
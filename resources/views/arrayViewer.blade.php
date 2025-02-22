<h1 class="textcenter uppercase">{{ $title }}</h1>
<table class="tableApp sortable margincenter">
	<thead>
		<tr class="controls">
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
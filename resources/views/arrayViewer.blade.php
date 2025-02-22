<table class="tableApp sortable margincenter">
	<thead>
		<tr class="controls"></tr>
		<tr class="header"></tr>
	</thead>
	<tbody></tbody>
</table>
<script>
	(function()
	{
		new TableApp($("table.tableApp"), "/api{{ $groupeType }}/{{ $url }}", "{{ $specialEdit }}");
	})();
</script>

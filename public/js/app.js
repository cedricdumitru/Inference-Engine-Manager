$(document).ready(function()
{
	$( "table.tableApp.sortable tbody" ).sortable({
		axis: "y",
		update(event, ui)
		{
			//TODO: recalculate Array && push modification to memory
		}
	});
	$( "table.tableApp.sortable tbody" ).disableSelection();
});
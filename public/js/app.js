class tableApp
{
	constructor(data, container)
	{
		this.header = data.header;
		this.data = data.data;
		this.container = container;
		this.buildTable()
		this.setSortable();
	}

	buildTable()
	{
		var self = this;
		this.header.forEach(function(index)
		{
			self.container.find("thead tr.header").append("<th scope=\"col\">"+index+"</th>");
		});

		this.data.forEach(function(index)
		{
			if (typeof index == "object")
			{
				self.container.find("tbody").append("<tr class=\"working\"></tr>");
				index.forEach(function(subIndex)
				{
					self.container.find("tbody tr.working").append("<td>"+index+"</td>");
				});
				self.container.find("tbody tr.working").removeClass("working");
			}
			else
				self.container.find("tbody").append("<tr><td>"+index+"</td></tr>");
		});
	}

	setSortable()
	{
		this.container.find("tbody" ).sortable(
		{
			axis: "y",
			update(event, ui)
			{
				//TODO: recalculate Array && push modification to memory
			}
		});
		this.container.find("tbody" ).disableSelection();
	}
}

$(document).ready(function()
{
});
class nestableNavBar
{
	constructor(container, resourceUrl)
	{
		if (!container.length || !resourceUrl.length) throw "Empty parameters, check container and resourceUrl are correctly provided";
		this.container = container;
		this.resourceUrl = resourceUrl
		this.getData();
	}

	getData()
	{
		let self = this;
		$.ajax(
			{
				url: this.resourceUrl,
				context: document.body,
				type: "GET",
				dataType: "json"
			}).done(function(data)
			{
				if (!data.length) throw "Empty data, check resourceUrl is correct";
				self.data = data;
				self.emptyContainer = $(self.container.clone());
				console.log(self.data);
//				self.buildTable();
			});
	}

	addControls()
	{
		let self = this;

		for(let i = 0; i < this.header.length - 1; i++)
		{
			this.container.find("thead tr.controls").append("<td></td>");
		}
		this.container.find("thead tr.controls").append("<td><div class=\"relative\"><i class=\"mdi mdi-close absolute pointer\"></i></div><div class=\"relative\"><i class=\"mdi mdi-check absolute pointer\"></i></div></td>");

		this.container.find("thead tr.controls td div i.mdi-close").click(function()
		{
			let container = self.destroyTable();

			new TableApp(container, self.submitUrl);
		});

		this.container.find("thead tr.controls td div i.mdi-check").click(function()
		{
			self.applyTable();
		});
	}
}

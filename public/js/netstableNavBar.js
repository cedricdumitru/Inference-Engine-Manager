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
				if (!data.length) return;
				self.data = data;
				self.emptyContainer = $(self.container.clone());
				console.log(self.data);
				self.buildList();
			});
	}
	
	buildList()
	{
		let root = this.container.append($("<ul class=\"navNestableRoot\"></ul>")).find("ul");
		this.data.forEach(element =>
		{
			if (!!element.referral)
			{
				let tempRoot = (root.find("li[data-id=\""+element.referral+"\"]>ul").length === 0)
					? root.find("li[data-id=\""+element.referral+"\"]").append($("<ul class=\"working\"></ul>")).find("ul")
					: root.find("li[data-id=\""+element.referral+"\"]>ul");
				tempRoot.append($("<li data-id=\""+element.id+"\" class=\"navNestableLine\">"+element.name+"</li>"));
			}
			else
			{
				root.append($("<li data-id=\""+element.id+"\" class=\"navNestableLine\">"+element.name+"</li>"))
			}
			console.log(element);
		});
	}
}

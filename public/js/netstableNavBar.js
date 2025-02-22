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
				self.buildList();
			});
	}
	
	buildList()
	{
		let root = this.container.append($("<ul class=\"navNestableRoot navNestable\"></ul>")).find("ul.navNestableRoot");
		this.data.forEach(element =>
		{
			if (!!element.referral)
			{
				root.find("li[data-id=\""+element.referral+"\"]>i").first().removeClass("mdi-folder-outline"); //Remove empty folder icon
				root.find("li[data-id=\""+element.referral+"\"]>i").first().addClass("mdi-folder-open"); //Add open folder icon

				let tempRoot = (root.find("li[data-id=\""+element.referral+"\"]>ul.navNestable").length === 0)
					? root.find("li[data-id=\""+element.referral+"\"]").append($("<ul class=\"navNestable\"></ul>")).find("ul.navNestable")
					: root.find("li[data-id=\""+element.referral+"\"]>ul.navNestable");
				tempRoot.append($("<li data-id=\""+element.id+"\" class=\"folder navNestableLine\"><i class=\"mdi mdi-folder-outline\"></i>"+element.name+"</li>"));
			}
			else
			{
				root.append($("<li data-id=\""+element.id+"\" class=\"folder navNestableLine\"><i class=\"mdi mdi-folder-outline\"></i>"+element.name+"</li>"));
			}
			if (element.products.length > 0)
			{
				root.find("li[data-id=\""+element.id+"\"]>i").first().removeClass("mdi-folder-outline"); //Remove empty folder icon
				root.find("li[data-id=\""+element.id+"\"]>i").first().addClass("mdi-folder-open"); //Add open folder icon
				
				let i = 0;
				while (i < element.products.length)
				{
					let product = element.products[i];
					let tempRoot = (root.find("li[data-id=\""+product.referral+"\"]>ul.navNestable").length === 0)
						? root.find("li[data-id=\""+product.referral+"\"]").append($("<ul class=\"navNestable\"></ul>")).find("ul.navNestable")
						: root.find("li[data-id=\""+product.referral+"\"]>ul.navNestable");
					tempRoot.append($("<li data-id=\""+product.id+"\" class=\"product navNestableLine\">"+product.name+"</li>"));
					i++;
				};
			}
		});

		root.find("li.folder").click(event => {
			event.stopPropagation();
			event.preventDefault();
			$(event.target).toggleClass("collapsed");
			$(event.target).hasClass('collapsed')
				? $(event.target).find("ul.navNestable").first().slideUp(200)
				: $(event.target).find("ul.navNestable").first().slideDown(200);
			$(event.target).find("i.mdi").first().toggleClass("mdi-folder");
			$(event.target).find("i.mdi").first().toggleClass("mdi-folder-open");
		});
		root.find("li.product").click(event => {
			event.stopPropagation();
			event.preventDefault();
			$(event.target).toggleClass("selected");
		});
		root.find("li").on('mouseover', event => { $(event.target).addClass('hovering'); });
		root.find("li").on('mouseout', event => { $(event.target).removeClass('hovering'); });
	}
}

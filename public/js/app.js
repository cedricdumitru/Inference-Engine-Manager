class tableApp
{
	constructor(data, container)
	{
		this.rawData = data;
		this.header = data.header;
		this.data = data.data;
		this.container = container;
		this.emptyContainer = $(this.container.clone());
		this.buildTable();
		this.setSortable();
	}

	addControls()
	{
		let self = this;

		this.container.find("thead tr.controls").append("<td><div class=\"relative\"><i class=\"mdi mdi-close absolute pointer\"></i></div></td><td><div class=\"relative\"><i class=\"mdi mdi-check absolute pointer\"></i></div></td>");

		this.container.find("thead tr.controls td div i.mdi-close").click(function()
		{
			let container = self.destroyTable();

			new tableApp(self.rawData, container);
		});
	}

	removeControls()
	{
		this.container.find("thead tr.controls td").remove();
	}

	destroyTable()
	{
		this.container.replaceWith(this.emptyContainer)
		return (this.emptyContainer);
	}

	setRemovableElement(element)
	{
		element.off();
		let self = this;
		element.hover(function()
		{
			//TODO: add delete icon to the right && bind event
		}, function()
		{
			//TODO: remove delete icon to the right && drop event
		});
	}

	setEditableContent(element)
	{
		element.off();
		let self = this;
		element.click(function()
		{
			if (element.hasClass("editing")) return;
			$(this).addClass("editing");
			(!isNaN(parseFloat($(this).text())) && isFinite($(this).text())) ? $(this).append("<input type=\"number\" value=\""+$(this).text()+"\"/>") : $(this).append("<input type=\"text\" value=\""+$(this).text()+"\"/>")
			$(this).find("input").focus();
			$(this).css({"font-size": "0px"});
			$(this).focusout(function()
			{
				$(this).text($(this).find("input").val());
				$(this).find("input").remove();
				$(this).css({"font-size": "1rem"});
				$(this).removeClass("editing");
				self.setEditableContent($(this));
				self.testForUpdates();
			});
		});
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
					self.container.find("tbody tr.working").append("<td>"+subIndex+"</td>");
				});
				self.setEditableContent(self.container.find("tbody tr.working td:not(.editing)"));
				self.container.find("tbody tr.working").removeClass("working");
			}
			else
			{
				self.container.find("tbody").append("<tr><td>"+index+"</td></tr>");
			}
		});
	}

	computeTable()
	{
		let computedArray = new Array();
		let self = this;
		this.container.find("tbody tr").each(function()
		{
			computedArray.push(self.elementToArray($(this)));
		});
		return(computedArray);
	}

	elementToArray(target)
	{
		let elementArray = new Array();
		let self = this;
		if (target.children.length > 1 && target.find("td").length > 1)
		{
			target.find("td").each(function()
			{
				elementArray.push(self.elementToArray($(this)));
			});
		}
		else
		{
			elementArray.push(target.text());
		}
		return (elementArray);
	}

	isEqual(value, other)
	{
		var type = Object.prototype.toString.call(value);
		
		if (type !== Object.prototype.toString.call(other)) return false;
		if (['[object Array]', '[object Object]'].indexOf(type) < 0) return false;
		
		var valueLen = (type === '[object Array]') ? value.length : Object.keys(value).length;
		var otherLen = (type === '[object Array]') ? other.length : Object.keys(other).length;
		
		if (valueLen !== otherLen) return false;
		
		var self = this;
		var compare = function (item1, item2)
		{
			var itemType = Object.prototype.toString.call(item1);
			
			if (['[object Array]', '[object Object]'].indexOf(itemType) >= 0)
			{
				if (!self.isEqual(item1, item2)) return false;
			}
			else
			{
				if (itemType !== Object.prototype.toString.call(item2)) return false;
				if (item1 !== item2) return false;
			}
		};

		if (type === '[object Array]')
		{
			for (var i = 0; i < valueLen; i++)
			{
				if (compare(value[i], other[i]) === false) return false;
			}
		}
		else
		{
			for (var key in value)
			{
				if (value.hasOwnProperty(key))
				{
					if (compare(value[key], other[key]) === false) return false;
				}
			}
		}
		return true;
	};

	testForUpdates()
	{
		let data = this.computeTable();
		if(!this.isEqual(data, this.data))
		{
			this.addControls();
			//TODO: fire Event to purpose submit
		}
		else
		{
			this.removeControls();
		}
	}

	setSortable()
	{
		let self = this;
		this.container.find("tbody" ).sortable(
		{
			axis: "y",
			update(event, ui)
			{
				self.testForUpdates();
			}
		});
		this.container.find("tbody" ).disableSelection();
	}
}

$(document).ready(function()
{
});
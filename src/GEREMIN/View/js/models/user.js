geremin.User = Backbone.Model.extend({
	urlRoot: "src/GEREMIN/Control/users",
	idAttribute: "_id",
	defaults: {
		_id		: null,
		nome	: "",
		cpf		: "",
		senha	: ""
	}
});
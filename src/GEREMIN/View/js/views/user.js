geremin.UserCreateView = Backbone.View.extend({

	events: {
		'click #cadastrar': 'cadastrar',
	},

    render: function () {
        this.$el.html(this.template(this.model.attributes));
        return this;
    },

	cadastrar: function(){
		var self = this;
		this.model.save(null, {
			success: function() {
				alert('Usuário salvo!');
			},
			error: function() {
				alert('Erro');
			}
		});
	}
});
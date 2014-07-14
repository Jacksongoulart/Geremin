geremin.ProfileView = Backbone.View.extend({

	events: {
		'click #sair': 'sair'
	},

    render: function () {
        this.$el.html(this.template());
        return this;
    },

    sair: function () {
		if (!geremin.loginView){
			geremin.loginView = new geremin.LoginView();
			geremin.loginView.render();
		}
		if (!geremin.homelView){
			geremin.homelView = new geremin.HomeView();
			geremin.homelView.render();
		}
		$('.loginForm').html(geremin.loginView.el);
		geremin.loginView.delegateEvents();
		$('#content').html(geremin.homelView.el);
    }
});
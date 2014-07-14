geremin.LoginView = Backbone.View.extend({

	events: {
		'click #entrar': 'login',
		'keypress input[type=password]': 'enter'
	},

	login: function() {
			
		if (!geremin.profileView){
			geremin.user = new geremin.User({_id:$("#email").val()});
			geremin.user.fetch({
				success: function(){
					if(geremin.user.get('error'))
						alert('Usuário inválido!');
					else{
						geremin.profileView = new geremin.ProfileView();
						geremin.profileView.render();
						$('.loginForm').html(geremin.profileView.el);
						geremin.profileView.delegateEvents();
						if (!geremin.homellView){
							geremin.homellView = new geremin.HomeLView();
							geremin.homellView.render();
						}
						$('#content').html(geremin.homellView.el);
					}
				}});
		}
		
	},

	enter: function(evt) {
		if (evt.keyCode == 13)
			this.login();
	},

    render: function () {
        this.$el.html(this.template());
        return this;
    },
});
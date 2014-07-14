var geremin = {

    views: {},

    models: {},

    loadTemplates: function(views, callback) {

        var deferreds = [];

        $.each(views, function(index, view) {
            if (geremin[view]) {
                deferreds.push($.get('tpl/' + view + '.php', function(data) {
                    geremin[view].prototype.template = _.template(data);
                }, 'html'));
            } else {
                alert(view + " not found");
            }
        });

        $.when.apply(null, deferreds).done(callback);
    }

};

geremin.Router = Backbone.Router.extend({

    routes: {
        "":                 "home",
        "contato":          "contact",
        "cadastrar":        "cadastrar",
        "sobre":            "about",
        "minicursos/:id":   "minDetails"
    },

    initialize: function () {
        geremin.shellView = new geremin.ShellView();
        $('.shell').html(geremin.shellView.render().el);
        geremin.loginView = new geremin.LoginView();
        $('.loginForm').html(geremin.loginView.render().el);
        this.$content = $("#content");
        geremin.cadastroView = new geremin.UserCreateView({model: new geremin.User});
        $('#modal1').html(geremin.cadastroView.render().el);
    },

    minDetails: function (id) {
        var minicurso = new geremin.Minicurso({_id: id});
        geremin.shellView.deselectMenuItem();
        minicurso.fetch({success: function(){
            $('#content').html(new geremin.MinicursoDetailView({model: minicurso}).render().el);
        }});
    },

    home: function () {
        // Since the home view never changes, we instantiate it and render it only once
        if (!geremin.homelView) {
            geremin.homelView = new geremin.HomeView();
            geremin.homelView.render();
        } else {
            console.log('reusing home view');
            geremin.homelView.delegateEvents(); // delegate events when the view is recycled
        }
        this.$content.html(geremin.homelView.el);
        geremin.shellView.selectMenuItem('home-menu');
        this.list();
    },

    list: function() {
        geremin.minList = new geremin.MinicursoCollection();
        geremin.minList.fetch({success: function(){
            if(!geremin.minicursosView){
                geremin.minicursosView = new geremin.MinicursoListView({model: geremin.minList});
            }
        }});
    },

    contact: function () {
        if (!geremin.contactView) {
            geremin.contactView = new geremin.ContactView();
            geremin.contactView.render();
        }
        this.$content.html(geremin.contactView.el);
        geremin.shellView.selectMenuItem('contact-menu');
    },

    about: function() {
        if (!geremin.aboutView) {
            geremin.aboutView = new geremin.AboutView();
            geremin.aboutView.render();
        }
        this.$content.html(geremin.aboutView.el);
        geremin.shellView.selectMenuItem('about-menu');
    }

});

$(document).on("ready", function () {
    geremin.loadTemplates(["HomeView", "AboutView", "HomeLView", "MinicursoView", "ContactView", "ShellView", "LoginView", "ProfileView", "MinicursoDetailView", "UserCreateView"],
        function () {
            geremin.router = new geremin.Router();
            Backbone.history.start();
        });
});

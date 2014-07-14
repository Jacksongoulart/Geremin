geremin.MinicursoListView = Backbone.View.extend({

    className: 'jumbotron',

    initialize: function() {
        $('.container').html(this.render().el);
    },

    render: function () {
        var minicursos = this.model.models;
        for (var i = 0; i < 4; i++){
            if(minicursos[i])
                $(this.el).append(new geremin.MinicursoView({model: minicursos[i]}).render().el);
        }
        return this;
    }
});
    

geremin.MinicursoView = Backbone.View.extend({
    className: "live-tile",

    initialize: function () {
        this.model.bind('change', this.render, this);
        this.model.bind("destroy", this.close, this);
    },

    render: function () {
        $(this.el).html(this.template(this.model.attributes));
        return this;
    }
});


geremin.MinicursoDetailView = Backbone.View.extend({

    render: function () {
        // var attr = this.model.attributes;
        // for (var id in attr.responsaveis){
        //     var user = new geremin.User({_id: attr.responsaveis[id]});
        //     user.fetch({success: function(){
        //         console.log(user.attributes);
        //         attr.responsaveis.push(user.attributes.nome);
        //     }});
        // }
        $(this.el).html(this.template(this.model.attributes));
        return this;
    }
});

geremin.MinicursoCreateView = Backbone.View.extend({

    render: function () {
        $(this.el).html(this.template());
        return this;
    }
});
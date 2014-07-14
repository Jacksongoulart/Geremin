geremin.Minicurso = Backbone.Model.extend({
    urlRoot: "src/GEREMIN/Control/minicursos",
    idAttribute: "_id",

    defaults: {
        _id: null,
        nome: "",
        descricao: "",
        responsaveis: [],
        periodo: "",
        qtdAulas: null,
        dataInicio: "",
        dataFim: ""
    }
});

geremin.MinicursoCollection = Backbone.Collection.extend({

    model: geremin.Minicurso,

    url: "src/GEREMIN/Control/minicursos"

});
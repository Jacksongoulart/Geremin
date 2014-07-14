/*
    If you are using the sample RESTFul services I published on GitHub, use the following URLs...

      - For the Node.js sample backend (available in https://github.com/ccoenraets/geremin-rest-nodejs)
        Use: http://localhost:3000/employees

      - For the PHP sample backend (available in https://github.com/ccoenraets/geremin-rest-php)
        Use: /geremin-rest-php/employees

 */

geremin.Employee = Backbone.Model.extend({

    urlRoot:"http://localhost:3000/employees",
//    urlRoot:"/geremin-rest-php/employees",

    initialize:function () {
        this.reports = new geremin.EmployeeCollection();
        this.reports.url = this.urlRoot + "/" + this.id + "/reports";
    }

});

geremin.EmployeeCollection = Backbone.Collection.extend({

    model: geremin.Employee,

    url:"http://localhost:3000/employees"
//    url:"/geremin-rest-php/employees"

});

var originalSync = Backbone.sync;
Backbone.sync = function (method, model, options) {
    if (method === "read") {
        options.dataType = "jsonp";
        return originalSync.apply(Backbone, arguments);
    }

};
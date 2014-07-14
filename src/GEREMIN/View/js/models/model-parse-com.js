Parse.initialize("3lJfd4T87rxDvs34BJcXEjO7tbJLAyQ4cN3XSwCv", "WInG2A7UMnpzeCH51SXB0pecsWWtmOKvjXyolLUm");

geremin.Employee = Parse.Object.extend({

    className: "employees",

    initialize: function() {
        this.reports = new geremin.ReportsCollection();
        this.reports.query = new Parse.Query(geremin.Employee).equalTo("managerId", this.id);
    }

});

geremin.EmployeeCollection = Parse.Collection.extend(({

    model: geremin.Employee,

    fetch: function(options) {
        console.log('custom fetch');
        if (options.data && options.data.name) {
            var firstNameQuery = new Parse.Query(geremin.Employee).contains("firstName", options.data.name);
            var lastNameQuery = new Parse.Query(geremin.Employee).contains("lastName", options.data.name);
            this.query = Parse.Query.or(firstNameQuery, lastNameQuery);
        }
        Parse.Collection.prototype.fetch.apply(this, arguments);

    }

}));

geremin.ReportsCollection = Parse.Collection.extend(({

    model: geremin.Employee

}));

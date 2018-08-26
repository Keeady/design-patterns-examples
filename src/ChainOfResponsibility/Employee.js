function Employee(name) {
    this.name = name;
    this.manager = '';
    this.level = 3;
}

Employee.prototype = {
    getManager: function () {
        return this.manager;
    },

    setManager: function(manager) {
        this.manager = manager;
    },

    setLevel: function(level) {
        this.level = level;
    },

    getLevel: function() {
        return this.level;
    },

    approve: function (request) {
        console.log(this.name);
        return true;
    }
}

module.exports = Employee;

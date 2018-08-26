var ApprovalRequest = function () {
    this.supportedType = {
        'discountApproval': true,
        'vacationApproval': true,
        'expenseApproval': true
    };
}

ApprovalRequest.prototype = {
    setRequester: function (employee) {
        this.requester = employee;

        return this;
    },

    getRequester: function () {
        return this.requester;
    },

    setAmount: function (amount) {
        this.amount = amount;

        return this;
    },

    getAmount: function () {
        return this.amount;
    },

    setType: function (type) {
        if (!this.supportedType[type]) {
            throw 'Unsupported type';
        }

        this.type = type;

        return this;
    },

    getType: function () {
        return this.type;
    }
}

module.exports = ApprovalRequest;

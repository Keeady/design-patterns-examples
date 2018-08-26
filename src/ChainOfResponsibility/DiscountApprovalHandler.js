var DiscountApprovalHandler = function () {
    this.executiveDiscount = 30;
    this.seniorDiscount = 20;
    this.managerDiscount = 10
}

DiscountApprovalHandler.prototype = {
    receive: function (request) {
        if (request.amount < this.managerDiscount) {
            request.level = 3;
        } else if (request.amount < this.seniorDiscount) {
            request.level = 2;
        } else {
            request.level = 1;
        }

        var manager = request.requester.getManager();
        if (request.level >= manager.getLevel()) {
            return manager.approve(request);
        } else {
            while (manager && manager.level > request.level) {
                manager = manager.getManager();
            }
        }

        return manager.approve(request);
    }
}

module.exports = DiscountApprovalHandler;

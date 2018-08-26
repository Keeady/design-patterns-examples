var DiscountApprovalHandler = require('./DiscountApprovalHandler');
var VacationApprovalHandler = require('./VacationApprovalHandler');

var RequestHandler = function () {

}

RequestHandler.prototype = {
    receive: function (request) {
        var handler;

        if (request.type == 'discountApproval') {
            handler = new DiscountApprovalHandler();
        } else if (request.type == 'vacationApproval') {
            handler = new VacationApprovalHandler()
        }

        return handler.receive(request);
    }
}

module.exports = RequestHandler;

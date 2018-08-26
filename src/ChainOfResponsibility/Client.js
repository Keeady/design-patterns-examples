var RequestHandler = require('./RequestHandler');
var Employee = require('./Employee');
var ApprovalRequest = require('./ApprovalRequest');

var exec = new Employee('Maddie B');
exec.setLevel(1);

var seniorManager = new Employee('Pete K');
seniorManager.setLevel(2);
seniorManager.setManager(exec);

var manager = new Employee('Mary J');
manager.setManager(seniorManager);

var request = new ApprovalRequest();
request.setType('discountApproval');
var jsmith = new Employee('John Smith');
jsmith.setManager(manager);
request.setRequester(jsmith);
request.setAmount(21);

var requestHandler = new RequestHandler();
var response = requestHandler.receive(request);
if (response) {
    console.log('request approved');
}

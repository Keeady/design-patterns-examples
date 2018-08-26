# Design Patterns Implementation
While studying design patterns, I struggled finding real world implementation and examples. I'm going to add my own examples here while following an online course on design patterns from Udemy as a refresher

## Chain of Responsibility
Designed to decouple the sender from the object which will handle  the request. It is beneficial 
especially when sender does not know which object will handle its request. Each handler attempt
to handle the request or pass it to the next handler on the chain.

In this example, we are going to illustrate a discount approval process. A sales representative can give a customer a single
one time discount during checkout. However, if the discount is above a given threshold, the discount first needs to be approved
before the order can be processed. In this case, the chain of approval has an automatic approval for small discounts, a manager
 approval for manager discount, a senior manager approval, and finally an executive level approval.

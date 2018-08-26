<?php
namespace Product\Discount;

abstract class Discount {}

class SaleDiscount {
    public $name;
    public $description;
    public $policies = array();
}

abstract class DiscountPolicy {}

class SaleDiscountPolicy extends DiscountPolicy {
    public $startDate;
    public $endDate;
    public $quantity;
    public $limit;
    public $amount;
    public $policies = array();
}

class ClubDiscountPolicy extends DiscountPolicy {
    public $startDate;
    public $endDate;
    public $quantity;
    public $limit;
    public $amount;
    public $policies = array();
}

abstract class PolicyBuilder {
    /**
     * @param $qty
     * @return PolicyBuilder
     */
    abstract public function setQuantity($qty);

    /**
     * @param $limit
     * @return PolicyBuilder
     */
    abstract public function setLimit($limit);

    /**
     * @param $amount
     * @return PolicyBuilder
     */
    abstract public function setAmount($amount);

    /**
     * @param $policy
     * @return PolicyBuilder
     */
    abstract public function addPolicy($policy);

    /**
     * @param $date
     * @return PolicyBuilder
     */
    abstract public function setStartDate($date);

    /**
     * @param $date
     * @return PolicyBuilder
     */
    abstract public function setEndDate($date);

    /**
     * @param $pid
     * @return PolicyBuilder
     */
    abstract public function setProductId($pid);

    /**
     * @param $min
     * @return PolicyBuilder
     */
    abstract public function setMin($min);

    /**
     * @return DiscountPolicy
     */
    abstract public function getPolicy();
}

class SalePolicyBuilder extends PolicyBuilder {
    private $policy;

    public function __construct()
    {
        $this->policy = new SaleDiscountPolicy();
    }

    public function setLimit($limit) {
        $this->policy->limit = $limit;
        return $this;
    }

    public function setQuantity($qty)
    {
        $this->policy->quantity = $qty;
        return $this;
    }

    public function setAmount($amount)
    {
        $this->policy->amount = $amount;
        return $this;
    }

    public function addPolicy($policy)
    {
        $this->policy->policies[] = $policy;
        return $this;
    }

    public function setStartDate($date)
    {
        // TODO: Implement setStartDate() method.
    }

    public function setEndDate($date)
    {
        // TODO: Implement setEndDate() method.
    }

    public function setProductId($pid)
    {
        // TODO: Implement setProductId() method.
    }

    public function setMin($min)
    {
        // TODO: Implement setMin() method.
    }

    public function getPolicy()
    {
        return $this->policy;
    }


}

class ClubPolicyBuilder extends PolicyBuilder {
    private $policy;

    public function __construct()
    {
        $this->policy = new ClubDiscountPolicy();
    }

    public function setQuantity($qty)
    {
        // TODO: Implement setQuantity() method.
    }

    public function setLimit($limit)
    {
        // TODO: Implement setLimit() method.
    }

    public function setAmount($amount)
    {
        // TODO: Implement setAmount() method.
    }

    public function addPolicy($policy)
    {
        // TODO: Implement addPolicy() method.
    }

    public function setStartDate($date)
    {
        // TODO: Implement setStartDate() method.
    }

    public function setEndDate($date)
    {
        // TODO: Implement setEndDate() method.
    }

    public function setProductId($pid)
    {
        // TODO: Implement setProductId() method.
    }

    public function setMin($min)
    {
        // TODO: Implement setMin() method.
    }

    public function getPolicy()
    {
        // TODO: Implement getPolicy() method.
    }

    public function setMinClubMemberLevel($min)
    {
        $this->policy->minClubMemberLevel = $min;
        return $this;
    }
}

class SalePolicyManager {
    /** @var PolicyBuilder */
    private $builder;

    public function __construct(PolicyBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function make()
    {
        $p = $this->builder->setQuantity(1)
            ->setAmount(0)
            ->setProductId(1)
            ->getPolicy();

        $parentPolicy = $this->builder
            ->setMin(2)
            ->setLimit(4)
            ->setProductId(1)
            ->addPolicy($p)
            ->setMinClubMemberLevel(4)
            ->getPolicy();
        return $parentPolicy;
    }
}

$discount = new SaleDiscount();
$discount->name = 'Sale Grande';
$discount->description = 'Buy 2 of Premium Product. Get 1 free';
$builder = new ClubPolicyBuilder();
$policyM = new SalePolicyManager($builder);
$policy = $policyM->make();
$discount->policies[] = $policy;
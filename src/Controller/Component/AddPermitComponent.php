<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use App\Model\Entity\Permit;

class AddPermitComponent extends Component
{
    public function addPermit($startdate = null, $enddate = null, $reason = null, $visitedcustomer = null, $user = null)
    {
        
        if ($startdate != null && $enddate != null && $user != null && $reason != null){

            $permit = $this->Permits->newEntity([
                'startdate' => $startdate,
                'enddate' => $enddate,
                'reason' => $reason,
                'visitedcustomer' => $visitedcustomer,
                'user_id' => $user->id
            ]);
        } else {
            $permit = $this->Permits->newEntity();
            $permit = $this->Permits->patchEntity($permit, $this->request->getData());
            
        }
        return ($this->Permits->save($permit));
    }
}
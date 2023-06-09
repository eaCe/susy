<?php

namespace App\Gamify\Points;

use QCod\Gamify\PointType;

class ActivityCreated extends PointType
{
    /**
     * Point constructor
     *
     * @param $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    /**
     * User who will be receive points
     *
     * @return mixed
     */
    public function payee()
    {
        return $this->getSubject()->user;
    }

    /**
     * Number of points
     *
     * @return float|int
     * @throws \QCod\Gamify\Exceptions\PointSubjectNotSet
     */
    public function getPoints()
    {
        return $this->getSubject()->getPoints() ?? 5;
    }
}

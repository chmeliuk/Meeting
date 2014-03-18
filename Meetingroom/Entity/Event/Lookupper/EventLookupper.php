<?php
namespace Meetingroom\Entity\Event\Lookupper;

use \Meetingroom\Entity\Event\Lookupper\Criteria\RoomCriteriaInterface;
use \Meetingroom\Entity\Event\Lookupper\Criteria\PeriodCriteriaInterface;

/**
 * Class EventLookupper
 * @package Meetingroom\Entity\Event\Lookupper
 * @author Denis Maximovskikh <denkin.syneforge.com>
 */
class EventLookupper implements \Meetingroom\Entity\Event\Lookupper\EventLookupperInterface
{
    protected $roomCriteria;
    protected $periodCriteria;
    protected $di;
    protected $db;
    protected $fields = [];


    public function __construct($di)
    {
        $this->di = $di;
        $this->db = $this->di->getShared('db');
    }

    /**
     * @param RoomCriteriaInterface $criteria
     *
     * @return Lookupper
     */
    public function setRoomCriteria(RoomCriteriaInterface $criteria)
    {
        $this->roomCriteria = $criteria;
        return $this;
    }

    /**
     * @param PeriodCriteriaInterface $criteria
     *
     * @return Lookupper
     */
    public function setPeriodCriteria(PeriodCriteriaInterface $criteria)
    {
        $this->periodCriteria = $criteria;
        return $this;
    }

    /**
     * @param array $fields
     * @return Lookupper
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     *Return search result
     *
     * @return array of Meetingroom\Entity\Event\Event
     */
    public function lookup()
    {

        $eventLookupperModel = new \Meetingroom\Entity\Event\Lookupper\EventLookupperModel();


        return $eventLookupperModel->getEvents($this->roomCriteria, $this->periodCriteria, $this->fields);
    }


}
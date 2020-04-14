<?php

namespace ItPeople\Site;

/**
 * Класс содержащий константы
 */
class Constant
{
	const IB_LEAD = 1;
    const IB_SALE = 2;
    
    public static $DATE_START = null;
    public static $DATE_END = null;

    const SHEDULE_GRID = [
    	'DEFAULT' => [
    		//'10:00', '10:30',
    		'11:00', '11:30',
    		'12:00', '12:30',
    		'13:00', '13:30',
    		'14:00', '14:30',
    		'15:00', '15:30',
    		'16:00', '16:30',
    		'17:00', '17:30',
    		'18:00', '18:30',
    		'19:00', '19:30',
    		'20:00', '20:30',
    		'21:00', '21:30',
	    ]
    ];
    
    const SLOTS = 1;
    
    const USER_GROUP_HOSTES = 5;
    const USER_GROUP_COORD = 6;
    
    const GENDER_MALE = 3;
    const GENDER_FEMALE = 4;
	
    const LEAD_STATUS_NEW = 'NEW';
    const LEAD_STATUS_LEAD = 'LEAD';
    const LEAD_STATUS_FINISHED = 'FINISHED';
    const LEAD_STATUS_REJECT = 'REJECT';
	
    public static function init () {
    	self::$DATE_START = \DateTime::createFromFormat('d.m.Y, H:i:s', '15.06.2019, 00:00:00');
    	self::$DATE_END = \DateTime::createFromFormat('d.m.Y, H:i:s', '16.10.2019, 23:59:59');
    }
}
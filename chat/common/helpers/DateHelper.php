<?php


namespace common\helpers;

/**
 * Class DateHelper
 * @package common\helpers
 */
class DateHelper
{
    /**
     * @param $timestamp
     * @return string
     */
    public static function getDate(int $timestamp): string
    {
        return date('d.m.Y H:i', $timestamp);
    }

}
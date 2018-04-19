<?php
/**
 * Created by PhpStorm.
 * User: DoubleJack
 * Date: 2018/4/19
 * Time: 20:19
 *
 * @function getTimeConversion 对比时间戳（精确到秒）  转换成 几 分钟/小时/天/周/月/年 前/后
 * @param string timeStamp1 时间戳1 必填
 * @param string timeStamp2 时间戳2 非必填（若为空则对比now）
 * @return array result ['before' => 'xxx前','after' => 'xxx后']
 */
CONST MINUTE = 60;
CONST HOUR = MINUTE * 60;
CONST DAY = HOUR * 24;
CONST WEEK = DAY * 7;
CONST MONTH = DAY * 30; //这里用30做演示，根据需要可以Loop array某年的某月具体有多少天
CONST YEAR = MONTH * 12;

function getTimeConversion($timestamp1,$timestamp2 = false) {

    $timestamp2 = $timestamp2 || time()/ 1000;
    $diff = $timestamp1 - $timestamp2;
    if ($diff > 0) {
        $diff = $timestamp1 - $timestamp2;
    } else {
        $diff = $timestamp2 - $timestamp1;
    }

    $yearDiff = $diff / YEAR;
    $monthDiff = $diff / MONTH;
    $weekDiff = $diff / WEEK;
    $dayDiff = $diff / DAY;
    $hourDiff = $diff / HOUR;
    $minDiff = $diff / MINUTE;
    $result = [];

    if ($yearDiff >= 1) {
        $result['before'] = intval($yearDiff) . "年前";
        $result['after'] = intval($yearDiff) . "年后";
    } else if ($monthDiff >= 1) {
        $result['before'] = intval($monthDiff) . "月前";
        $result['after'] = intval($monthDiff) . "月后";
    } else if ($weekDiff >= 1) {
        $result['before'] = intval($weekDiff) . "周前";
        $result['after'] = intval($weekDiff) . "周后";
    } else if ($dayDiff >= 1) {
        $result['before'] = intval($dayDiff) . "天前";
        $result['after'] = intval($dayDiff) . "天后";
    } else if ($hourDiff >= 1) {
        $result['before'] = intval($hourDiff) . "小时前";
        $result['after'] = intval($hourDiff) . "小时后";
    } else if ($minDiff >= 1) {
        $result['before'] = intval($minDiff) . "分钟前";
        $result['after'] = intval($minDiff) . "分钟后";
    } else {
        $result['before'] = $result['after'] = "刚刚";
    }
    return $result;

}






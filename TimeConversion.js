/**
 * Created by PhpStorm.
 * User: DoubleJack
 * Date: 2018/4/19
 * Time: 20:22
 *
 * @method getTimeConversion 对比时间戳（精确到秒）  转换成 几 分钟/小时/天/周/月/年 前/后
 * @param timeStamp1 时间戳1 必填
 * @param timeStamp2 时间戳2 非必填（若为空则对比now）
 * @return array result ['before':'xxx前','after':'xxx后']
 */
function getTimeConversion (timeStamp1, timeStamp2) {
    var minute = 60;
    var hour = minute * 60;
    var day = hour * 24;
    var month = day * 30;
    var year = month * 12;
    var dateTimeStamp1 = timeStamp1;
    var dateTimeStamp2 = timeStamp2 || (new Date().getTime())/1000;
    var diff = dateTimeStamp1 - dateTimeStamp2;
    if (diff > 0) {
        diff = dateTimeStamp1 - dateTimeStamp2;
    } else {
        diff = dateTimeStamp2 - dateTimeStamp1;
    }

    var yearDiff = diff / year;
    var monthDiff = diff / month;
    var weekDiff = diff / (7 * day);
    var dayDiff = diff / day;
    var hourDiff = diff / hour;
    var minDiff = diff / minute;
    var result = [];
    if (yearDiff >= 1) {
        result['before'] = parseInt(yearDiff) + "年前";
        result['after'] = parseInt(yearDiff) + "年后";
    } else if (monthDiff >= 1) {
        result['before'] = parseInt(monthDiff) + "月前";
        result['after'] = parseInt(monthDiff) + "月后";
    } else if (weekDiff >= 1) {
        result['before'] = parseInt(weekDiff) + "周前";
        result['after'] = parseInt(weekDiff) + "周后";
    } else if (dayDiff >= 1) {
        result['before'] = parseInt(dayDiff) + "天前";
        result['after'] = parseInt(dayDiff) + "天后";
    } else if (hourDiff >= 1) {
        result['before'] = parseInt(hourDiff) + "小时前";
        result['after'] = parseInt(hourDiff) + "小时后";
    } else if (minDiff >= 1) {
        result['before'] = parseInt(minDiff) + "分钟前";
        result['after'] = parseInt(minDiff) + "分钟后";
    } else {
        result['before'] = result['after'] = "刚刚";
    }
    return result;
}
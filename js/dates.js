/* 
 * Copyright (C) 2022 SimRacingWorld by Francisco Costa
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Counts the number of days beteween two dates
function countDays(start, end) {
    var startdate = new Date(start);
    var enddate = new Date(end);
//var startdate = new Date(document.getElementById('txtstartdate').value);
    //var enddate = new Date(document.getElementById('txtenddate').value);
    var ndays;
    if (enddate > startdate) {
        ndays = enddate.getTime() - startdate.getTime();
        ndays = ndays / (1000 * 3600 * 24);
    }
    alert(ndays);
    return ndays;
}

// Format date to UTC YYYY-MM-DD and adds a number of day to that date
function formatDateUTC(daystoadd) {
    var appdate = new Date();
    appdate.setDate(appdate.getDate() + daystoadd);
    var day = appdate.getUTCDay() + 1; //getUTCDay returns the first day as Zer0
    var month = appdate.getUTCMonth() + 1; //getUTCMonth returns first month as Zer0
    var year = appdate.getUTCFullYear();
    if (day < 10) { //adding leading zero to day
        day = '0' + day;
    }
    if (month < 10) { //adding leading zero to month
        month = '0' + month;
    }
    var dateformated = year + '-' + month + '-' + day;
    return dateformated;
}

// Sets the starting date in form to be the next day
// and the ending date to be at maximum 365 days after the starting date.
function setMinMaxDate() {
    var maxdate = formatDateUTC(365);
    var mindate = formatDateUTC(1);
    document.getElementById('txtstartdate').min = mindate;
    document.getElementById('txtenddate').max = maxdate;
}
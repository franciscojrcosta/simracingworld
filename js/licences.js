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


var ndays;
var totalprice;

// Counts the number of days beteween two dates
function countDays() {
    let startdate = new Date(document.getElementById('txtstartdate').value);
    let enddate = new Date(document.getElementById('txtenddate').value);
    if (enddate > startdate) {
        ndays = enddate.getTime() - startdate.getTime();
        ndays = ndays / (1000 * 3600 * 24);
    } else {
        ndays = '0';
    }
    return ndays;
}

// Format date to UTC YYYY-MM-DD and adds a number of day to that date
function formatDateUTC(daystoadd) {
    let appdate = new Date();
    appdate.setDate(appdate.getDate() + daystoadd);
    let day = appdate.getUTCDate(); //getUTCDate  returns the day number
    let month = appdate.getUTCMonth() + 1; //getUTCMonth returns first month as Zer0
    let year = appdate.getUTCFullYear();
    if (day < 10){ //adding leading zero to day
        day = '0' + day;
    }
    if (month < 10) { //adding leading zero to month
        month = '0' + month;
    }
    let dateformated = year + '-' + month + '-' + day;
    return dateformated;
}

// Sets the starting date field in form
// date picker min is set to the current UTC day
// date picker max is set to 365 days after the starting date.
function setStartDate() {
    let mindate = formatDateUTC(0);
    let maxdate = formatDateUTC(365);
    document.getElementById('txtstartdate').min = mindate;
    document.getElementById('txtstartdate').max = maxdate;
}

// Sets the ending date field in form
// date picker min is set to the current UTC day
// date picker max is set to 365 days after the starting date.
function setEndDate() {
    let mindate = document.getElementById('txtstartdate').value;
    document.getElementById('txtenddate').min = mindate;
}

function calculateTotalPrice() {
    ndays = countDays();
    let licencelist = document.getElementsByName('lstlicences');
    let nlicences = licencelist.length;
    for (var i = 0, max = nlicences; i < max; i++) {
        var licenceprice = licencelist.item(i).value;
        if (licencelist.item(i).checked) {
            totalprice = licenceprice * ndays;
        }
    }
    document.getElementById('txtoutput').value = totalprice;
}
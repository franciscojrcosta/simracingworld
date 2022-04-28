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


function countDays(){
    var startdate = new Date(document.getElementById('txtstartdate').value);
    var enddate = new Date(document.getElementById('txtenddate').value);
    var ndays;
    if (enddate > startdate){
        ndays = enddate.getTime() - startdate.getTime();
        ndays = ndays / (1000*3600*24);
    }
    
    alert(ndays);
}
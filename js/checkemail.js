/* 
 * Copyright (C) 2021 SimRacingWorld by Francisco Costa
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

$('document').ready(function(){
 var email_state = false;
  $('#email').on('blur', function(){
 	var email = $('#email').val();
 	if (email == '') {
 		email_state = false;
 		return;
 	}
 	$.ajax({
      url: 'register.php',
      type: 'post',
      data: {
      	'email_check' : 1,
      	'email' : email,
      },
      success: function(response){
      	if (response == 'taken' ) {
          email_state = false;
          $('#email').parent().removeClass();
          $('#email').parent().addClass("form_error");
          $('#email').siblings("span").text('Sorry... Email already taken');
      	}else if (response == 'not_taken') {
      	  email_state = true;
      	  $('#email').parent().removeClass();
      	  $('#email').parent().addClass("form_success");
      	  $('#email').siblings("span").text('Email available');
      	}
      }
 	});
 });

 $('#reg_btn').on('click', function(){
 	var username = $('#username').val();
 	var email = $('#email').val();
 	var password = $('#password').val();
 	if (username_state == false || email_state == false) {
	  $('#error_msg').text('Fix the errors in the form first');
	}else{
      // proceed with form submission
      $.ajax({
      	url: 'register.php',
      	type: 'post',
      	data: {
      		'save' : 1,
      		'email' : email,
      		'username' : username,
      		'password' : password,
      	},
      	success: function(response){
      		alert('user saved');
      		$('#username').val('');
      		$('#email').val('');
      		$('#password').val('');
      	}
      });
 	}
 });
});


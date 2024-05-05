function validateLoginForm(){
   if( document.loginForm.username.value == "" )
   {
     alert( "Please provide your username!" );
     document.loginForm.username.focus();
     return false;
   }
   if( document.loginForm.password.value == "" )
   {
     alert( "Please provide your password!" );
     document.loginForm.password.focus();
     return false;
   }
   if( checkRoleChoice()!=true )
   {
     alert( "Please provide your role!" );
     document.loginForm.level.focus();
     return false;
   }
}

function validateProfile(){
  if( document.profileForm.userId.value == "")
  {
    alert( "Please provide userId!" );
     document.profileForm.userId.focus();
     return false;
  }
  if( document.profileForm.level.value == "")
  {
    alert( "Please provide user role!" );
     document.profileForm.level.focus();
     return false;
  }
  if( document.profileForm.staffNo.value == "")
  {
    alert( "Please provide staffNo!" );
     document.profileForm.staffNo.focus();
     return false;
  }
  if( document.profileForm.name.value == "")
  {
    alert( "Please provide name!" );
     document.profileForm.name.focus();
     return false;
  }
  if( document.profileForm.ic.value == "")
  {
    alert( "Please provide ic number!" );
     document.profileForm.ic.focus();
     return false;
  }
  if( document.profileForm.DOB.value == "")
  {
    alert( "Please provide date of birth!" );
     document.profileForm.DOB.focus();
     return false;
  }
  if( document.profileForm.gender.value == "")
  {
    alert( "Please provide gender!" );
     document.profileForm.gender.focus();
     return false;
  }
  if( document.profileForm.email.value == "")
  {
    alert( "Please provide email!" );
     document.profileForm.email.focus();
     return false;
  }
  if( document.profileForm.phone.value == "")
  {
    alert( "Please provide phone number!" );
     document.profileForm.phone.focus();
     return false;
  }
  if( document.profileForm.homeAddress.value == "")
  {
    alert( "Please provide address!" );
     document.profileForm.homeAddress.focus();
     return false;
  }
  if( document.profileForm.password.value == "")
  {
    alert( "Please provide password!" );
     document.profileForm.password.focus();
     return false;
  }
  if( document.profileForm.cpassword.value == "")
  {
    alert( "Please provide confirm password!" );
     document.profileForm.cpassword.focus();
     return false;
  }
  if(checkChangedPassword()!=true){
    alert( "The password is not matching!" );
    return false;
  }
}

function validateLeaveAppForm(){
  if( document.leaveAppForm.startDuration.value == "" )
  {
      alert( "Please provide your start date on leave!" );
      document.leaveAppForm.startDuration.focus();
      return false;
  }
  if( document.leaveAppForm.endDuration.value == "" )
  {
      alert( "Please provide your end date on leave!" );
      document.leaveAppForm.endDuration.focus();
      return false;
  }   
  if( checkStartDuration()!=true )
  {
      alert( "Please provide a start date later than today's date!" );
      document.leaveAppForm.startDuration.focus();
      return false;
  }
  if( checkLeaveDuration()!=true )
  {
      alert( "Please provide an end date later than the start date!" );
      document.leaveAppForm.endDuration.focus();
      return false;
  }
  if( checkLeaveType()!=true )
  {
      alert( "Please provide your leave type!" );
      document.leaveAppForm.leaveType.focus();
      return false;
  }
  if( document.leaveAppForm.reason.value == "" )
  {
      alert( "Please provide your reason to leave!" );
      document.leaveAppForm.reason.focus();
      return false;
  }
}

function checkRoleChoice(){
  if( document.loginForm.level.value == "" )
  {
    document.getElementById('roleMessage').style.color = 'red';
    document.getElementById('roleMessage').innerHTML = 'Choose your role';
    return false;
  } 
  else {
    document.getElementById('roleMessage').innerHTML = '';
    return true;
  }
}

function checkRoleChoice2(){
  if( document.profileForm.level.value == "" )
  {
    document.getElementById('roleMessage').style.color = 'red';
    document.getElementById('roleMessage').innerHTML = 'Choose a role';
    return false;
  } 
  else {
    document.getElementById('roleMessage').innerHTML = '';
    return true;
  }
}

function checkChangedPassword(){
  if (document.getElementById('password').value == document.getElementById('cpassword').value) {
    document.getElementById('passwordMessage').style.color = 'green';
    document.getElementById('passwordMessage').innerHTML = 'Matching';
    return true;
  } else {
    document.getElementById('passwordMessage').style.color = 'red';
    document.getElementById('passwordMessage').innerHTML = 'Not Matching';
    return false;
  }
}

function checkStartDuration(){
  var chosenDate = new Date(document.getElementById('startDuration').value);
  var now = new Date();
  if ( chosenDate < now) {
      document.getElementById('dateMessage1').style.color = 'red';
      document.getElementById('dateMessage1').innerHTML = 'The start date should be after today';
      return false;
  }
  else{
      document.getElementById('dateMessage1').innerHTML = '';
      return true;
  }
}

function checkLeaveDuration(){
  var startDate = new Date(document.getElementById('startDuration').value);
  var endDate = new Date(document.getElementById('endDuration').value);
  if (startDate > endDate) {
      document.getElementById('dateMessage2').style.color = 'red';
      document.getElementById('dateMessage2').innerHTML = 'The end date should be later than the start date';
      return false;
  }
  else{
      document.getElementById('dateMessage2').innerHTML = '';
      return true;
  }
}

function checkLeaveType(){
  if (document.getElementById('leaveType').value == "") {
      document.getElementById('leaveTypeMessage').style.color = 'red';
      document.getElementById('leaveTypeMessage').innerHTML = 'Please choose a leave type';
      return false;
  }
  else{
      document.getElementById('leaveTypeMessage').innerHTML = '';
      return true;
  }
}

function getApproveConfirmation(){
  var app = confirm("Do you want to approve this leave application?");
  if (app == true){
    return true;
  }
  else{
    return false;
  }
}

function getRejectConfirmation(){
  var rej = confirm("Do you want to reject this leave application?");
  if (rej == true){
    return true;
  }
  else{
    return false;
  }
}

function getDeleteConfirmation(){
  var del = confirm("Do you want to delete this leave application?");
  if (del == true){
    return true;
  }
  else{
    return false;
  }
}

function getDeleteConfirmation2(){
  var del = confirm("Do you want to delete this user?");
  if (del == true){
    return true;
  }
  else{
    return false;
  }
}

function changePassword(){
  document.getElementById("password").disabled = false;
  const newLabel = document.createElement("label");
  newLabel.setAttribute('class', 'profile');
  newLabel.setAttribute('for', 'cpassword');
  newLabel.innerText = "Confirm Password : ";
  const newInput = document.createElement("input");
  newInput.setAttribute('type','password');
  newInput.setAttribute('name','cpassword');
  newInput.setAttribute('id','cpassword');
  newInput.addEventListener('keyup', checkChangedPassword);
  document.getElementById("changePassword").appendChild(newLabel);
  document.getElementById("changePassword").appendChild(newInput);
}

function cancelChangePassword(){
  document.getElementById("password").disabled = true;
  let element = document.getElementById("changePassword");
  while (element.firstChild) {
    element.removeChild(element.firstChild);
  }
  document.getElementById('passwordMessage').innerHTML = '';
}
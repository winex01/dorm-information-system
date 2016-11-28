<?php require_once('header.php'); ?>
 <div id="wrapper">
<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav" style="margin-top: 20px;">
        <li >
            <a href="javascript:;">
            <strong>Dormitory Info System</strong>
            </a>
        </li>
        <li >
            <a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
        </li>
        <li>
            <a href="javascript:;" id="newData"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Student</a>
        </li>
        <li>
            <a href="javascript:;" id="addUser"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add User</a>
        </li>
        <li>
            <a href="javascript:;" id="changePass"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Change Password</a>
        </li>
        <li>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle" style="margin-top: -10px;">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                Menu</a>
                <h2>Welcome to dashboard <?php echo getUserName(); ?></h2>
                <!-- main content -->
                <div style="margin-top: 10px; margin-bottom: 10px;">
                    <button type="button" id="newData2" class="btn btn-default">New
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    </button>
                </div>
                <div id="showData">
                    <!-- table -->
                </div>
                <!-- end main content -->
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once('include.php'); ?>

<script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>

<script>
	// Menu Toggle Script
	$(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });       
    });

    $(document).ready(function() {

        //open changepas modal
        $('#changePass').click(function(event) {
            $('#passModal').modal('show');
            $('#passModal').find('.modal-title').text('Change Password');
        });

        //modal pass reset erase data
        $('#passModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            var newPass = $('input[id=newPass]');
            var confirmPass  = $('input[id=confirmPass]');

            newPass.parent().removeClass('has-error');
            newPass.parent().parent().removeClass('has-error');
            $('#np-err').text('');

            confirmPass.parent().removeClass('has-error');
            confirmPass.parent().parent().removeClass('has-error');
            $('#cp-err').text('');

            $('#newPass').focus();
        });

        //newpass modal
        $('#passSave').click(function() {
            var newPass = $('input[id=newPass]');
            var confirmPass  = $('input[id=confirmPass]');
            var result = '';
            if(newPass.val() == ''){
                newPass.parent().addClass('has-error');
                newPass.parent().parent().addClass('has-error');
                $('#np-err').text('Enter new password');
                $('#newPass').focus();
            }else{
                newPass.parent().removeClass('has-error');
                newPass.parent().parent().removeClass('has-error');
                $('#np-err').text('');
                $('#confirmPass').focus();
                result += '1';
            }
            if(confirmPass.val() == ''){
                confirmPass.parent().addClass('has-error');
                confirmPass.parent().parent().addClass('has-error');
                $('#cp-err').text('Confirm your password');
            }else{
                confirmPass.parent().removeClass('has-error');
                confirmPass.parent().parent().removeClass('has-error');
                $('#cp-err').text('');
                result += '2';
            }
            if(newPass.val() != confirmPass.val() && result == '12'){
                $('#response').text('Password not match')
            }else{
                $('#response').text('')
                result += '3';
            }
            if(result == '123'){
                $.ajax({
                        url: '../data/changepass.php',
                        type: 'post',
                        data: {password: confirmPass.val()},
                        success: function (data) {
                            // console.log(data);
                            $('#passModal').modal('hide');
                            $('#msgModal').modal('show');
                            $('#msgModal').find('#msgbody').text(data);
                        },
                        error: function (){
                            alert('Error database cannot update password');
                        }
                    });//end ajax
            }
        });//#passSave


        //addUser open modal
        $('#addUser').click(function() {
            $('#userModal').modal('show');
        });
        //resset data sa user modal or erase
         //modal pass reset erase data
        $('#userModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            var username = $('input[id=newUserName]');
            var password = $('input[id=newUserPass]');
            var confirmPassword = $('input[id=newConfirmPass]');

            username.parent().removeClass('has-error');
            username.parent().parent().removeClass('has-error');
            $('#nun-err').text('');

            password.parent().removeClass('has-error');
            password.parent().parent().removeClass('has-error');
            $('#nup-err').text('');

            confirmPassword.parent().removeClass('has-error');
            confirmPassword.parent().parent().removeClass('has-error');
            $('#ncp-err').text('');

            $('#user-form-response').text('');

            $('#newUserName').focus();
        });
        //modal user save button
        $('#userSave').click(function() {
            var username = $('input[id=newUserName]');
            var password = $('input[id=newUserPass]');
            var confirmPassword = $('input[id=newConfirmPass]');
            var result = '';
            if(username.val() == ''){
                username.parent().addClass('has-error');
                username.parent().parent().addClass('has-error');
                $('#newUserName').focus();
                $('#nun-err').text('Username is required.');
            }else{
                result += '1';
                username.parent().removeClass('has-error');
                username.parent().parent().removeClass('has-error');
                $('#newUserPass').focus();
                $('#nun-err').text('');
            }
            if(password.val() == ''){
                password.parent().addClass('has-error');
                password.parent().parent().addClass('has-error');
                $('#nup-err').text('Password is required.');
                if(result == '1'){ $('#newUserPass').focus();}
            }else{
                result += '2';
                password.parent().removeClass('has-error');
                password.parent().parent().removeClass('has-error');
                if(result == '12'){$('#newConfirmPass').focus();}
                $('#nup-err').text('');
            }
            if(confirmPassword.val() == ''){
                confirmPassword.parent().addClass('has-error');
                confirmPassword.parent().parent().addClass('has-error');
                $('#ncp-err').text('Please Confirm Password.');
            }else{
                result += '3';
                confirmPassword.parent().removeClass('has-error');
                confirmPassword.parent().parent().removeClass('has-error');
                $('#ncp-err').text('');
            }
            //compare pass and confirm
            if(result == '123' && password.val() != confirmPassword.val()){
                $('#user-form-response').text('Password not match');
            }else{
                $('#user-form-response').text('');
                result += '4';
            }
            if(result == '1234'){
                $.ajax({
                        url: '../data/addUser.php',
                        type: 'post',
                        data: {username: username.val(), password: password.val()},
                        success: function (data) {
                            if(data == '1'){
                                $('#user-form-response').text('Username Already Exist');
                            }else{
                                $('#msgModal').modal('show');
                                $('#msgModal').find('#msgbody').text(data);
                                $('#userModal').modal('hide');
                            }
                        },
                        error: function (){
                            alert('could not add data from the database.');
                        }
                    });
            }//end result == '12345'
        });
        //end addUser open modal


        //#newData open modal
        $('#newData').click(function() {
            addNewModal();
        });
        $('#newData2').click(function() {
            addNewModal();
        });
        $('#modal-boarder').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            var firstName = $('input[id=firstName]');
            var middleName = $('input[id=middleName]');
            var lastName = $('input[id=lastName]');
            var telNumber = $('input[id=telNumber]');
            var phoneNumber = $('input[id=phoneNumber]');
            var homeAddress = $('textarea[id=homeAddress]');

            firstName.parent().removeClass('has-error');
            firstName.parent().parent().removeClass('has-error');
            $('#fN-err').text('');

            middleName.parent().removeClass('has-error');
            middleName.parent().parent().removeClass('has-error');
            $('#mN-err').text('');

            lastName.parent().removeClass('has-error');
            lastName.parent().parent().removeClass('has-error');
            $('#lN-err').text('');

            telNumber.parent().removeClass('has-success');
            $('#tN-err').text('');

            phoneNumber.parent().removeClass('has-error');
            phoneNumber.parent().parent().removeClass('has-error');
            $('#pN-err').text('');

            homeAddress.parent().removeClass('has-error');
            homeAddress.parent().parent().removeClass('has-error');
            $('#hA-err').text('');

            $('#firstName').focus();
        });
        //function for adding new student
        function addNewModal(){
            $('#modal-boarder').modal('show');
            $('#modal-boarder').find('.modal-title').text('Add New Student');
        }//end function addNew
        $('#saveBoarder').click(function() {
            var firstName = $('input[id=firstName]');
            var middleName = $('input[id=middleName]');
            var lastName = $('input[id=lastName]');
            var telNumber = $('input[id=telNumber]');
            var phoneNumber = $('input[id=phoneNumber]');
            var homeAddress = $('textarea[id=homeAddress]');
            var result = '';
            telNumber.parent().addClass('has-success');
            $('#telNum-err').addClass('has-success');
             $('#tN-err').text('Optional');
            if(firstName.val()  == ''){
                firstName.parent().addClass('has-error');
                firstName.parent().parent().addClass('has-error');
                $('#firstName').focus();
                $('#fN-err').text('First name is required');
            }else{
                result += '1';
                firstName.parent().removeClass('has-error');
                firstName.parent().parent().removeClass('has-error');
                $('#fN-err').text('');
                $('#middleName').focus();
            }
            if(middleName.val() ==''){
                middleName.parent().addClass('has-error');
                middleName.parent().parent().addClass('has-error');
                $('#mN-err').text('Middle name is required');
                if(result == '1'){$('#middleName').focus();}
            }else{
                result += '2';
                middleName.parent().removeClass('has-error');
                middleName.parent().parent().removeClass('has-error');
                $('#mN-err').text('');
                if(result == '12'){ $('#lastName').focus();}
            }
            if(lastName.val() == ''){
                lastName.parent().addClass('has-error');
                lastName.parent().parent().addClass('has-error');
                $('#lN-err').text('Last name is required');
            }else{
                result += '3';
                lastName.parent().removeClass('has-error');
                lastName.parent().parent().removeClass('has-error');
                $('#lN-err').text('');
                if(result == '123'){$('#phoneNumber').focus();}
            }
            if(phoneNumber.val() == ''){
                phoneNumber.parent().addClass('has-error');
                $('#pN-err').text('Phone # is required');
            }else{
                result += '4';
                phoneNumber.parent().removeClass('has-error');
                $('#pN-err').text('');
                if(result == '1234'){$('#homeAddress').focus();}
            }
            if(homeAddress.val() == ''){
                homeAddress.parent().addClass('has-error');
                homeAddress.parent().parent().addClass('has-error');
                $('#hA-err').text('Address is required');
            }else{
                result += '5';
                 homeAddress.parent().removeClass('has-error');
                homeAddress.parent().parent().removeClass('has-error');
                $('#hA-err').text('');
            }
            if(result == '12345'){
                var html = '';
               $.ajax({
                        url: '../data/addBoarder.php',
                        type: 'post',
                        data: {
                            firstName : firstName.val(),
                            middleName : middleName.val(),
                            lastName : lastName.val(),
                            telNumber : telNumber.val(),
                            phoneNumber : phoneNumber.val(),
                            homeAddress : homeAddress.val()
                        },
                        success: function (data) {
                            // console.log(data);
                            $('#msgModal').modal('show');
                            $('#msgModal').find('#msgbody').text(data);
                            $('#modal-boarder').modal('hide');
                            showAllBoarders();
                        },
                        error: function(){
                            alert('Error 12345: error adding data to the database.');
                        }
                    }); 
            }//end ajax result == 12345
        });
    });//end document ready

    //display all boarders
    showAllBoarders();//display data on the table
    function showAllBoarders()
    {
        var html = '';
        var i;
        $.ajax({
                url: '../data/showAllBoarders.php',
                type: 'post',
                async: false,
                success: function (data) {
                    // console.log(data);
                    // alert(data);
                    // console.log = function(){}
                    $('#showData').html(data);
                },
                error: function(){
                    alert('could not get data from db to table');
                }
        });
    }
    //end display all boarders

    //view sms modal
    var smsID,phoneNum;
    function sms(id, phoneNum)
    {
        this.smsID = id;
        this.phoneNum = phoneNum;
        $('#modal-sms').modal('show'); 
        $('#smsPhoneNum').val(phoneNum);
    }

    var smsMessage = $('textarea[id=smsMessage]');
    $('#smsSend').click(function() {
        // phoneNum
        $('#smsMessage').focus();
        var result = '';
        if(smsMessage.val() == ''){
            smsMessage.parent().addClass('has-error');
            smsMessage.parent().parent().addClass('has-error');
        }else if(smsMessage.val().length > 100){
            $('#sM-err').text('You can only enter 100 characters.');
        }else{
            result += '1';
            smsMessage.parent().removeClass('has-error');
            smsMessage.parent().parent().removeClass('has-error');
            $('#sM-err').text('');
        }
        if(result == '1'){
            $('#msgModal').modal('show');
            $.ajax({
                    url: '../data/sendsms.php',
                    type: 'post',
                    dataType: 'json',
                    data: {phoneNum : phoneNum, smsMessage : smsMessage.val()},
                    success: function (data) {
                        if(data.message == 'ACCEPTED'){
                            $('#msgModal').find('#msgbody').text('Message Send Successfully');
                        }else{
                            $('#msgModal').find('#msgbody').text('Invalid Mobile Number');
                        }
                    },
                    error: function(){
                        alert('error ajax sending sms');
                    }
                });
            $('#modal-sms').modal('hide');
        }//end result == 1
    });//end $smsSend

    //clear sms modal when close
     $('#modal-sms').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
             smsMessage.parent().removeClass('has-error');
             smsMessage.parent().parent().removeClass('has-error');
            $('#smsMessage').focus();
    });
    //end sms


    //delete boarder
    var delId;
    function deleteBoarder(id, name)
    {
        this.delId = id;
        $('#modal-delete').modal('show');
        $('#modal-delete').find('#body-delete').text(name);
    }
    $('#deleteConfirm').click(function() {
        $.ajax({
                url: '../data/deleteBoarder.php',
                type: 'post',
                data: {id: delId},
                success: function (data) {
                    // alert(data);
                    $('#msgModal').modal('show');
                    $('#msgModal').find('#msgbody').text(data);
                    showAllBoarders();
                },
                error: function(){
                    alert('Error: data cannot delete student');
                }
            });
    });
    //end delete boarder/student/data


      //fill data
      var firstName, middleName, lastName, telNumber, phoneNumber, homeAddress;
      var uID;
    function flllModal(fN, hA, id, lN, mN, pN, tN)
    {   
        // console.log(fN+' '+hA+' '+id+' '+lN+' '+mN+' '+pN+' '+tN);
        //fill inputs
        this.uId = id;
        this.firstName = $('input[id=upFirstName]');
        this.middleName = $('input[id=upMiddleName]');
        this.lastName = $('input[id=upLastName]');
        this.telNumber = $('input[id=upTelNumber]');
        this.phoneNumber = $('input[id=upPhoneNumber]');
        this.homeAddress = $('textarea[id=upHomeAddress]');
        firstName.val(fN);
        middleName.val(mN);
        lastName.val(lN);
        telNumber.val(tN);
        phoneNumber.val(pN);
        homeAddress.val(hA);
    }//end fill data
    //update save button click
    $('#updateBoarderBUtton').click(function() {
        var result = '';
        if(firstName.val() == ''){
             firstName.parent().addClass('has-error');
             firstName.parent().parent().addClass('has-error');
        }else{
            result += '1';
            firstName.parent().removeClass('has-error');
            firstName.parent().parent().removeClass('has-error');
        }
        if(middleName.val() == ''){
             middleName.parent().addClass('has-error');
             middleName.parent().parent().addClass('has-error');
        }else{
            result += '2';
            middleName.parent().removeClass('has-error');
            middleName.parent().parent().removeClass('has-error');
        }
        if(lastName.val() == ''){
             lastName.parent().addClass('has-error');
             lastName.parent().parent().addClass('has-error');
        }else{
            result += '3';
            lastName.parent().removeClass('has-error');
            lastName.parent().parent().removeClass('has-error');
        }
        if(phoneNumber.val() == ''){
             phoneNumber.parent().addClass('has-error');
             phoneNumber.parent().parent().addClass('has-error');
        }else{
            result += '4';
            phoneNumber.parent().removeClass('has-error');
            phoneNumber.parent().parent().removeClass('has-error');
        }
        if(homeAddress.val() == ''){
             homeAddress.parent().addClass('has-error');
             homeAddress.parent().parent().addClass('has-error');
        }else{
            result += '5';
            homeAddress.parent().removeClass('has-error');
            homeAddress.parent().parent().removeClass('has-error');
        }
        if(result == '12345'){
            //send ajax request to update data
            $.ajax({
                    url: '../data/updateBoarder.php',
                    type: 'post',
                    data: {
                        id : uId,
                        fN : firstName.val(),
                        mN : middleName.val(),
                        lN : lastName.val(),
                        tN : telNumber.val(),
                        pN : phoneNumber.val(),
                        hA : homeAddress.val()
                    },
                    success: function (data) {
                        // console.log(data);
                        $('#modal-update-form').modal('hide');
                        $('#msgModal').modal('show');
                        $('#msgModal').find('#msgbody').text();
                        showAllBoarders();
                    }
                });
        }
    });//end #updateBoarderButton
    //getBoarder
    function getBoarder(id)
    {
        //get the data first then pass to update data function
        //get data and put in modal ang value
        $.ajax({
                url: '../data/getBoarder.php',
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    $('#modal-update-form').modal('show');
                    $('#modal-update-form').find('.modal-title').text('Update Data');
                    //short variables
                    var fN = data.boarder_firstName;
                    var hA = data.boarder_homeAddress;
                    var id = data.boarder_id;
                    var lN = data.boarder_lastName;
                    var mN = data.boarder_middleName;
                    var pN = data.boarder_phoneNum;
                    var tN = data.boarder_telephoneNum;
                    flllModal(fN, hA, id, lN, mN, pN, tN);
                },
                error: function(){
                    alert('Error: could not get data in the database');
                }
            });
    }
    //ene getBoarder
    
    function test()
    {
        alert('Dont run this or you will get fucked up.');
    }
    console.log = function(){}
</script>

</body>
</html>
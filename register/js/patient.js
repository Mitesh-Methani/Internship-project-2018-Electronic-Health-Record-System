$(document).ready(function() {

    image64 = '';
    aadhar64 = '';
    pin = null;

   /* let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function(content) {
        var parser = new DOMParser();
        scanner.stop();
        var jsonData = xmlToJson(parser.parseFromString(content, "text/xml"));
        jsonData = jsonData.PrintLetterBarcodeData.UserData;
        console.log(jsonData);

        $('#name').val(jsonData.name);
        $('#uidai1').val(jsonData.uid.substring(0, 4));
        $('#uidai2').val(jsonData.uid.substring(4, 8));
        $('#uidai3').val(jsonData.uid.substring(8, 12));
        $('#add').val(jsonData.house + ", " + jsonData.street + ", " + jsonData.loc + ", " + jsonData.lm + ", " + jsonData.vtc + ", " + jsonData.dist + ", " + jsonData.state + ": " + jsonData.pc);
        switch (jsonData.gender) {
            case 'M':
                $('#male').prop('checked', true);
                break;
            case 'F':
                $('#female').prop('checked', true);
                break;
            default:
                break;
        }
    });

    Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        })
        .catch(function(e) {
            console.error(e);
        });
*/
    $('#getotp').click(function() {
               $.ajax({
                    url: 'otp.php',
                    type: 'POST',
                    data: { email: email },
                    success: function(response) {
                        response = JSON.parse(response);
                        console.log(response);
                        if (response.status == 'Success') {
                            $('#getotp').text('Resend OTP');
                            $('#submit').removeAttr('disabled');
                            $('#mob').prop('readonly', true);
                            pin = response.pin;
                        } else {
                            UIkit.modal.alert('Couldn\'t send SMS! please try again').show();
                        }
                    }
                });
            }, function() {

            }).show();
        } else {
            UIkit.modal.alert('Enter valid mobile no.').show();
        }
    });

    $('#submit').click(function(e) {
        e.preventDefault();
        uidai = $('#uidai1').val() + $('#uidai2').val() + $('#uidai3').val();
        name = $('#name').val();
        address = $('#add').val();
        mobile = $('#country_code').val() + $('#mob').val();
        gender = $("input[name='gender']:checked").val();
        blood_group = $('#blood_group').val();
        email = $('#email').val();
        dob = $('#dob').val();
        otp = $('#pin').val();

        if (otp != pin) {
            UIkit.modal.alert('Wrong OTP entered!').show();
            return;
        }

        if (uidai.length != 12 || name.trim().length == 0 || address.trim().length == 0 || mobile.trim().length != 13 || email.trim().length == 0 || !gender || otp != pin || pin == null || dob.trim().length == 0 || blood_group.trim().length == 0 || image64 == '' || aadhar64 == '') {
            UIkit.modal.alert('Please fill all the necessary data!').show();
            return;
        }

        var patient = { uidai: uidai, name: name, address: address, mobile: mobile, email_id: email, gender: gender, dob: dob, blood_group: blood_group, image: image64, aadhar: aadhar64 };

        $.ajax({
            url: '../apis/Patient/index.php',
            type: 'POST',
            data: { patient: JSON.stringify(patient) },
            success: function(res) {
                res = JSON.parse(res);
                console.log(res);
                if (res[0].status == 'Success') {
                    $(location).attr('href', 'patient.php');
                } else {
                    alert(res[0].error);
                }
            }
        });
    });

    $('#b1').click(function() {
        $('#imagefile').click();
    });

    $('#b2').click(function() {
        $('#aadharfile').click();
    });

});

function xmlToJson(xml) {

    // Create the return object
    var obj = {};

    if (xml.nodeType == 1) { // element
        // do attributes
        if (xml.attributes.length > 0) {
            obj["UserData"] = {};
            for (var j = 0; j < xml.attributes.length; j++) {
                var attribute = xml.attributes.item(j);
                obj["UserData"][attribute.nodeName] = attribute.nodeValue;
            }
        }
    } else if (xml.nodeType == 3) { // text
        obj = xml.nodeValue;
    }

    // do children
    if (xml.hasChildNodes()) {
        for (var i = 0; i < xml.childNodes.length; i++) {
            var item = xml.childNodes.item(i);
            var nodeName = item.nodeName;
            if (typeof(obj[nodeName]) == "undefined") {
                obj[nodeName] = xmlToJson(item);
            } else {
                if (typeof(obj[nodeName].push) == "undefined") {
                    var old = obj[nodeName];
                    obj[nodeName] = [];
                    obj[nodeName].push(old);
                }
                obj[nodeName].push(xmlToJson(item));
            }
        }
    }
    return obj;
};

function moveToNext(params) {
    switch (params) {
        case 1:
            var val = document.getElementById('uidai1').value;
            if (val.length >= 4) {
                document.getElementById('uidai2').focus();
            }
            break;
        case 2:
            var val = document.getElementById('uidai2').value;
            if (val.length >= 4) {
                document.getElementById('uidai3').focus();
            }
            break;
        case 3:
            var val = document.getElementById('uidai3').value;
            if (val.length >= 4) {
                document.getElementById('name').focus();
            }
            break;
        default:
            break;
    }
}


function moveTopre(params) {
    switch (params) {
        case 3:
            var val = document.getElementById('name').value;
            if (val.length ==0) {
                document.getElementById('uidai3').focus();
            }
            break;
        case 2:
            var val = document.getElementById('uidai3').value;
            if (val.length ==0) {
                document.getElementById('uidai2').focus();
            }
            break;
        case 1:
            var val = document.getElementById('uidai2').value;
            if (val.length ==0) {
                document.getElementById('uidai1').focus();
            }
            break;
        default:
            break;
    }
}






function moveToNextKeyDown(params) {
    switch (params) {
        case 1:
            var val = document.getElementById('uidai1').value;
            if (val.length == 4) {
                document.getElementById('uidai2').focus();
            }
            break;
        case 2:
            var val = document.getElementById('uidai2').value;
            if (val.length == 4) {
                document.getElementById('uidai3').focus();
            }
            break;
        case 3:
            var val = document.getElementById('uidai3').value;
            if (val.length == 4) {
                document.getElementById('name').focus();
            }
            break;
        default:
            break;
    }
}

function imagepreview(input) {
    if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/gif' || input.files[0].type == 'image/jpeg') {
        var filerd = new FileReader();
        filerd.onload = function(en) {
            $('#imagepreview').append('<img src="' + en.target.result + '" height="100px" width="100px">');
        }
        filerd.onloadend = function() {
            image64 = filerd.result.split(',')[1];
        }
        filerd.readAsDataURL(input.files[0]);
    } else {
        alert('Invalid file type');
    }
}

function aadharpreview(input) {
    if (input.files[0].type == 'image/png' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/gif' || input.files[0].type == 'image/jpeg') {
        var filerd = new FileReader();
        filerd.onload = function(en) {
            $('#aadharpreview').append('<img src="' + en.target.result + '" height="100px" width="100px">');
        }
        filerd.onloadend = function() {
            aadhar64 = filerd.result.split(',')[1];
        }
        filerd.readAsDataURL(input.files[0]);
    } else {
        alert('Invalid file type');
    }
}
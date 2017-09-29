/**
 * Created by achsuthanmahendran on 9/20/17.
 */


function sendmessage()
{
    if(document.getElementById("email").value=="" || document.getElementById("name").value=="" || document.getElementById("comment")=="")
    {
        document.getElementById('fail_input').style.display = "block";
    }
    else {
        document.getElementById('fail').style.display = "none";
        document.getElementById('success').style.display = "none";
        document.getElementById('fail_input').style.display = "none";
        var xmlhttp = new XMLHttpRequest();
        var data = new FormData();
        data.append("email", document.getElementById("email").value);
        data.append("name", document.getElementById("name").value);
        data.append("message", document.getElementById("comment").value);
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                var output = JSON.parse(this.responseText);


                if (output.status == "200") {
                    document.getElementById('success').style.display = "block";
                    document.getElementById("fail").style.display="none";
                    document.getElementById('email').value = '';
                    document.getElementById('name').value = '';
                    document.getElementById('comment').value = '';
                }
                else {
                    document.getElementById('success').style.display = "none";
                    document.getElementById('fail').style.display = "block";
                }

            }
        };
        xmlhttp.open("POST", "http://localhost/Final/Mail/mail.php");
        xmlhttp.send(data);
    }
}

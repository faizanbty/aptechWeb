<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-1.8.2.js"></script>
    <script src="jquery-1.8.2.min.js"></script>
</head>

<script>
    // Show Search Bar
    function search() {
        $("#main").show();
    }
    // Hide Search Bar
    function hide() {
        $("#main").hide();
    }
    // Show Record
    function showRec() {
        $("#grid").show()
        var mtable = document.getElementById("mtable");
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var pwd = document.getElementById("pwd").value;


        mtable.innerHTML = "";

        var employee = {
            "name": name,
            "email": email,
            "pwd": pwd
        };


        var emp = JSON.stringify(employee);
        //    GET DATA FROM SERVER
        $.ajax({
            url: "http://localhost/Ajax/inputCustomer.php",
            contentType: "application/json",
            dataType: "json",
            data: {
                emp
            },
            method: "GET"
        }).done(function(data, status) {
            if (status == "success") {
                if (data.length > 0) {

                    for (var i = 0; i <= data.length; i++) {
                        mtable.innerHTML += "<tr><td>" + data[i].customerName + "</td><td>" + data[i].email + "</td><td>" + data[i].phone + "</td><td>" + data[i].addressLine1 + "</td></tr>";
                    }

                } else {
                    alert("No data exist");
                }
            }
        }).fail(function() {
            alert("Authentication Error");
        });


    }
</script>

<body>
    <input type="button" value="Search" onclick=search()>
    <input type="button" value="Hide" onclick=hide()>
    <input type="button" value="Add Record" onclick=addRec()>
    <div id="main" style="display: none">
        <table>
            <tr>
                <td>Enter Name</td>
                <td> <input type="text" id="name"></td>
            </tr>
            <tr>
                <td>Enter Email</td>
                <td> <input type="text" id="email"></td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td> <input type="text" id="pwd"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" value="Show Record" onclick=showRec()></td>
            </tr>
        </table>
    </div>


    <div id="grid" style="display: none">
        <table id="mtable">
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
            </tr>

        </table>
    </div>


</body>

</html>
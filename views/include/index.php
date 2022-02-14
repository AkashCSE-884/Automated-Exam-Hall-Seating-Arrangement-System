<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body>
    <div id="dataLoad">

    </div>
    <script>
        // $.ajax({
        //         method: "POST",
        //         url: "../process/dataProcess.php",
        //         data: {
        //             name: "John",
        //             location: "Boston"
        //         }
        //     })
        //     .done(function(msg) {
        //         console.log(msg)
        //         // alert("Data Saved: " + msg);
        //     });
        const dataLoad = async() => {
            // let obj = {
            //     "name": ""
            // }
            var formData = new FormData(); 
            formData.append('name', 'hello');
            let res = await fetch('../process/dataProcess.php', {
                method: 'POST',
                body: formData
            });
            let data = await res.json();

            console.log(data);
        }
        dataLoad()

        // var url = '../process/dataProcess.php';
        // var formData = new FormData();
        // formData.append('name', 'hello');
        // fetch(url, {
        //     method: 'POST',
        //     body: formData
        // }).then(function(response) {
        //     return response.text();
        // }).then(function(body) {
        //     console.log(body);
        // });
    </script>
</body>

</html>
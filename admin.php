<?php
session_start();
include_once("header.php");
if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0 || $_SESSION['admin'] == NULL) {
    header("location: ../~bams/");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1">
        <title>BAMS</title>
    </head>
    <body>
        <h1 style="margin-top:2%;text-align:center;" >User Search</h1>
        <form style="text-align:center;" onsubmit="submitform(event)">
            Search by Username: <input name='movietitle' onkeyup="searchpartial(event)">
            <input type="submit">
        </form>
        <div style="text-align:center;text-decoration:none;" id="result" class="account-section">

        </div>
        <script>
function submitform(evt) {
    console.log("You submitted a form!");
    evt.preventDefault();
    var data = new FormData(evt.srcElement);

    fetch("fetch.php", {
        method: "POST",
        body: data
    })
    .then(response => response.json())
    .then(json => {
        console.log("Response received, processing...")
        results = document.getElementById("results");
        results.innerHTML = ""; // clear any previous results
        json.forEach(row => {
            let elem = document.createElement("div");
            elem.innerHTML = `<a style='margin-bottom:5%;' href="user.php?movieId=${row.uid}">${row.uid}</a>`;
            results.append(elem);
        });
    })
    .catch(err => {
        console.log("Error caught in fetch() call:");
        console.error(err);
    });

    console.log("Made fetch() call");
}
function searchpartial(evt) {
    console.log("You entered a partial search string!");
    console.log(evt);
    var data = new FormData();
    data.append("partialmovietitle", evt.srcElement.value);
    console.log(data);

    fetch("fetch.php", {
        method: "POST",
        body: data
    })
    .then(response => response.json())
    .then(json => {
        console.log("fetch response turned into json");
        console.log(json);
        let results = document.getElementById("result");
        results.innerHTML = "";
        json.forEach(row => {
            let elem = document.createElement("div");
            elem.innerHTML = `<a href="user.php?movieId=${row.uid}">${row.uid}</a>`;
            results.append(elem);
        });
    })
    .catch(err => {
        console.log("Error caught in fetch() call");
        console.error(err);
    });

    console.log("Made fetch() call");
}
        </script>
    </body>
</html>

$(document).ready(function() {
    console.log("ready");

    $("#welcome").addClass("animate__animated animate__bounce");
    $(".navbar-brand").hover(function() {
        $(".navbar-brand").addClass("animate__animated animate__heartBeat");
    });

    let reqURL =
        "https://api.data.gov.sg/v1/environment/2-hour-weather-forecast";
    let request = new XMLHttpRequest();
    request.open("GET", reqURL);
    request.responseType = "json";
    request.send();
    request.onload = function() {
        let weather = JSON.stringify(
            request.response.items[0].forecasts[0].forecast
        );
        $("#weather").html(weather);
    };

    let reqURL1 = "https://api.data.gov.sg/v1/environment/air-temperature";
    let request1 = new XMLHttpRequest();
    request1.open("GET", reqURL1);
    request1.responseType = "json";
    request1.send();
    request1.onload = function() {
        let temp = JSON.stringify(request1.response.items[0].readings[0].value);
        $("#temp").html(temp);
    };
});

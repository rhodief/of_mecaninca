
var interval_request;

function sendDelay(value, url, delay, fn){
    clearTimeout(interval_request);
    interval_request = setTimeout(function(){sendRequest(value, url, fn)}, delay);
}

function sendRequest(val, url, fn){
    $.get(url, {s:val}, function(data, status){
        fn(data);
    });
}
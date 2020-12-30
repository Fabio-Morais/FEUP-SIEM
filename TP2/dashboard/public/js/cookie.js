function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
function createCookie(cname, cvalue, exdays, dayMinute) {
    var d = new Date();
    if (dayMinute == "day")
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    else if (dayMinute == "minute")
        d.setTime(d.getTime() + (exdays * 60 * 1000));

    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
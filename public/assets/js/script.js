function updateDate() {
    const today = new Date();
    let day = today.getDate();
    let month = today.getMonth() + 1;
    const year = today.getFullYear();
    let hour = today.getHours();
    let minute = today.getMinutes();
    let second = today.getSeconds();

    day = (day < 10) ? '0' + day : day;
    month = (month < 10) ? '0' + month : month;
    hour = (hour < 10) ? '0' + hour : hour;
    minute = (minute < 10) ? '0' + minute : minute;
    second = (second < 10) ? '0' + second : second;

    const newDate = day + '-' + month + '-' + year + ' ' + hour + ':' + minute + ':' + second;

    document.getElementById('server-time').innerHTML = newDate;
}

setInterval(updateDate, 1000);

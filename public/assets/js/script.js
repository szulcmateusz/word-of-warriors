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

const display = document.getElementById('action-countdown');
let [hours, minutes, seconds] = display.textContent.split(':').map(Number);

function countdown() {
    if (seconds === 0) {
        if (minutes === 0) {
            if (hours === 0) {
                setTimeout(() => {
                    window.location.reload();
                }, 1000)
                return;
            } else {
                hours--;
                minutes = 59;
            }
        } else {
            minutes--;
        }
        seconds = 59;
    } else {
        seconds--;
    }

    let hoursStr = hours.toString().padStart(2, '0');
    let minutesStr = minutes.toString().padStart(2, '0');
    let secondsStr = seconds.toString().padStart(2, '0');

    display.textContent = `${hoursStr}:${minutesStr}:${secondsStr}`;

    setTimeout(countdown, 1000);
}

countdown();
